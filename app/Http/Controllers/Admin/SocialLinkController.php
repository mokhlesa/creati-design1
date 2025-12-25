<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social-links.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.social-links.create');
    }

    private function getDefaultIcon($name)
    {
        $icons = [
            'Facebook' => 'theme/assets/img/icons/f.png',
            'Twitter' => 'theme/assets/img/icons/t.png',
            'Instagram' => 'theme/assets/img/icons/i.png',
            'Pinterest' => 'theme/assets/img/icons/p.png',
            'WhatsApp' => 'theme/assets/img/icons/w.png',
        ];

        return $icons[$name] ?? null;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        } else {
            $data['icon'] = $this->getDefaultIcon($request->name);
        }

        SocialLink::create($data);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link created successfully.');
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        } elseif ($socialLink->name !== $request->name) {
             // If name changed and no new icon, use default for new name
             $data['icon'] = $this->getDefaultIcon($request->name);
        }

        $socialLink->update($data);

        return redirect()->route('admin.social-links.index')->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Social link deleted successfully.');
    }
}