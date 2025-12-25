<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Illuminate\Support\Facades\Http;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('student.consultation.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.consultation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
            'prompt' => 'nullable|string|max:1000',
        ]);

        try {
            // 1. Upload the image
            $path = $request->file('image')->store('consultations', 'public');
            $fullPath = Storage::disk('public')->path($path);
            $mimeType = File::mimeType($fullPath);
            $imageData = base64_encode(File::get($fullPath));

            // 2. Prepare prompt
            $userPrompt = $request->input('prompt');
            if (empty($userPrompt) && $request->input('prompt_template')) {
                $userPrompt = $request->input('prompt_template');
            }
            $userPrompt = $userPrompt ?? 'قم بتحليل هذا التصميم وقدم ملاحظات بناءة.';
            
            // 3. Call Vertex AI API directly
            $apiKey = env('GOOGLE_API_KEY');
            // Use the Vertex AI endpoint as requested/tested
            $url = "https://aiplatform.googleapis.com/v1/publishers/google/models/gemini-2.5-flash-lite:generateContent?key={$apiKey}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $userPrompt],
                            [
                                'inlineData' => [
                                    'mimeType' => $mimeType,
                                    'data' => $imageData
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

            $result = $response->json();
            Log::info('Vertex AI Response: ', ['result' => $result]);

            $feedback = '';
            if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                $feedback = $result['candidates'][0]['content']['parts'][0]['text'];
            }

            if (empty(trim($feedback))) {
                // Fallback check for errors in response
                if (isset($result['error'])) {
                     $feedback = 'خطأ من الذكاء الاصطناعي: ' . ($result['error']['message'] ?? 'غير معروف');
                } else {
                    $feedback = 'لم يتمكن الذكاء الاصطناعي من تقديم تحليل للصورة. يرجى المحاولة مرة أخرى.';
                }
                Log::warning('Vertex AI returned empty feedback.', ['result' => $result]);
            }

            // 4. Save to Database
            Consultation::create([
                'user_id' => Auth::id(),
                'image_url' => $path,
                'prompt' => $userPrompt,
                'feedback' => $feedback,
                'status' => 'completed', 
            ]);

            return redirect()->route('student.consultation.index')
                ->with('success', 'تم استلام استشارتك وتحليلها بنجاح!');

        } catch (\Exception $e) {
            Log::error('Vertex AI Consultation Error: ' . $e->getMessage());
            
            if (isset($path) && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            return back()->with('error', 'حدث خطأ أثناء معالجة الاستشارة: ' . $e->getMessage())
                         ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        // Ensure the user owns this consultation
        if ($consultation->user_id !== Auth::id()) {
            abort(403);
        }
        
        // Since we don't have a specific show view yet, we can return the index 
        // with just this item or create a show view. 
        // For now, let's create a simple show view or just return to index.
        // But since standard resource expects a show, let's just make a simple one or rely on index.
        // Actually, the user's flow seems to be just index -> create -> index.
        
        return view('student.consultation.index', ['consultations' => [$consultation]]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        if ($consultation->user_id !== Auth::id()) {
            abort(403);
        }

        if ($consultation->image_url) {
            Storage::disk('public')->delete($consultation->image_url);
        }

        $consultation->delete();

        return redirect()->route('student.consultation.index')
            ->with('success', 'تم حذف الاستشارة بنجاح.');
    }
}
