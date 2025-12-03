<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Gemini\Laravel\Facades\Gemini;

class ConsultationController extends Controller
{
    public function showAssessorPage()
    {
        return view('consultations.assessor');
    }

    /**
     * Store a newly created consultation in storage after getting AI feedback.
     */
    public function store(Request $request)
    {
        // 1. Validate the form input
        $request->validate([
            'design_file' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'design_concept' => 'required|string|max:2000',
        ]);

        // 2. Determine the prompt
        $prompt = $request->input('design_concept');

        // 3. Store the image file
        $path = $request->file('design_file')->store('consultations', 'public');
        
        // 4. Set fixed feedback for debugging as requested
        $feedback = 'هذه استجابة ثابتة لأغراض التصحيح. لم يتم دمج Gemini API بشكل كامل بعد في هذا القسم.';

        // NOTE: Gemini API integration commented out for debugging with fixed feedback
        /*
        if (!config('gemini.api_key')) {
            Storage::disk('public')->delete($path);
            return back()->with('error', 'The Gemini API key is not configured. Please contact the site administrator.');
        }

        try {
            $imagePath = Storage::disk('public')->path($path);
            $imageMimeType = File::mimeType($imagePath);
            $imageData = File::get($imagePath);

            $result = Gemini::geminiProVision()
                ->withPrompt($prompt)
                ->withImage($imageData, $imageMimeType)
                ->generate();

            $feedback = $result->text();

        } catch (\Exception $e) {
            Log::error('Gemini API Error in public assessor: ' . $e->getMessage());
            Storage::disk('public')->delete($path);
            return back()->with('error', 'Failed to get feedback from the AI. Please try again later.');
        }
        */

        // 5. Create the consultation record in the database
        Consultation::create([
            'user_id' => Auth::id(),
            'image_url' => $path,
            'prompt' => $prompt,
            'feedback' => $feedback,
            'status' => 'completed',
        ]);

        // 6. Redirect to the student's consultation index page
        return redirect()->route('student.consultation.index')
                         ->with('success', 'Your new AI consultation is ready (debug feedback)!');
    }
}
