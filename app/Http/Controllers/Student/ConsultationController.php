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

    /**
     * Store a newly created resource in storage.
     */
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
            $userPrompt = $userPrompt ?? 'Analyze this design and provide constructive feedback.';
            
            // 3. Call Gemini API
            $result = Gemini::generativeModel('gemini-1.5-flash')->generateContent([
                $userPrompt,
                new Blob(
                    mimeType: MimeType::from($mimeType),
                    data: $imageData
                )
            ]);

            $feedback = $result->text();

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
            Log::error('Gemini Consultation Error: ' . $e->getMessage());
            
            // Cleanup uploaded file if API fails (optional but good practice)
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
