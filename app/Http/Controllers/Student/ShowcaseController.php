<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentShowcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showcases = Auth::user()->studentShowcases()->latest()->paginate(10);
        return view('student.showcases.index', compact('showcases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.showcases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'project_url' => 'nullable|url',
        ]);

        Auth::user()->studentShowcases()->create($request->all());

        return redirect()->route('student.showcases.index')
                         ->with('success', 'Showcase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentShowcase $showcase)
    {
        // Ensure the student can only view their own showcase
        if ($showcase->user_id !== Auth::id()) {
            abort(403);
        }
        return view('student.showcases.show', compact('showcase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentShowcase $showcase)
    {
        // Ensure the student can only edit their own showcase
        if ($showcase->user_id !== Auth::id()) {
            abort(403);
        }
        return view('student.showcases.edit', compact('showcase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentShowcase $showcase)
    {
        // Ensure the student can only update their own showcase
        if ($showcase->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|url',
            'project_url' => 'nullable|url',
        ]);

        $showcase->update($request->all());

        return redirect()->route('student.showcases.index')
                         ->with('success', 'Showcase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentShowcase $showcase)
    {
        // Ensure the student can only delete their own showcase
        if ($showcase->user_id !== Auth::id()) {
            abort(403);
        }
        
        $showcase->delete();

        return redirect()->route('student.showcases.index')
                         ->with('success', 'Showcase deleted successfully.');
    }
}