<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('user')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        return view('admin.portfolios.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'url' => 'nullable|url|max:255',
            'user_id' => 'nullable|exists:users,id', // Optional: Assign to a specific user
        ]);

        $data = $request->only(['title', 'description', 'url', 'user_id']);
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('portfolio_images', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'تم إنشاء معرض الأعمال بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        // Eager load the user relationship
        $portfolio->load('user');
        // Fetch all users to populate the dropdown
        $users = \App\Models\User::all();
        return view('admin.portfolios.edit', compact('portfolio', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'url' => 'nullable|url|max:255',
            'user_id' => 'nullable|exists:users,id', // Optional: Assign to a specific user
        ]);

        $data = $request->only(['title', 'description', 'url', 'user_id']);
        
        // Update slug only if title has changed significantly or if it's new
        if ($portfolio->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($portfolio->image_path) {
                Storage::disk('public')->delete($portfolio->image_path);
            }
            $data['image_path'] = $request->file('image')->store('portfolio_images', 'public');
        } elseif ($request->input('remove_image')) { // Handle removing the image
            if ($portfolio->image_path) {
                Storage::disk('public')->delete($portfolio->image_path);
                $data['image_path'] = null;
            }
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'تم تحديث معرض الأعمال بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete associated image file
        if ($portfolio->image_path) {
            Storage::disk('public')->delete($portfolio->image_path);
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'تم حذف معرض الأعمال بنجاح.');
    }
}