<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function showAssessorPage()
    {
        return view('consultations.assessor');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'design_file' => 'required|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,mp4,mov,avi,pdf|max:10240', // 10MB Max
            'design_concept' => 'required|string',
        ]);

        $filePath = null;
        if ($request->hasFile('design_file')) {
            $filePath = $request->file('design_file')->store('consultations', 'public');
        }

        Consultation::create([
            'user_id' => Auth::id(),
            'design_file_url' => $filePath,
            'design_concept' => $request->design_concept,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Your consultation request has been submitted successfully.');
    }
}