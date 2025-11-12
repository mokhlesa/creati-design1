<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function index()
{
$posts = Post::with('category', 'user')->latest()->paginate(10);
return view('admin.posts.index', compact('posts'));
}

public function create()
{
$categories = Category::all();
// نفترض أن الإداريين والمعلمين يمكنهم كتابة المقالات
$authors = User::whereIn('role_id', [1, 2])->get();
return view('admin.posts.create', compact('categories', 'authors'));
}

public function store(Request $request)
{
$request->validate([
'title' => 'required|string|max:255',
'content' => 'required|string',
'category_id' => 'nullable|exists:categories,id',
'user_id' => 'required|exists:users,id',
]);

Post::create([
'title' => $request->title,
'slug' => Str::slug($request->title),
'content' => $request->content,
'category_id' => $request->category_id,
'user_id' => $request->user_id, // أو يمكن استخدام Auth::id()
'published_at' => now(), // نشر المقال مباشرة
]);

return redirect()->route('admin.posts.index')->with('success', 'تم إنشاء المقال بنجاح.');
}

public function show(Post $post)
{
return view('admin.posts.show', compact('post'));
}

public function edit(Post $post)
{
$categories = Category::all();
$authors = User::whereIn('role_id', [1, 2])->get();
return view('admin.posts.edit', compact('post', 'categories', 'authors'));
}

public function update(Request $request, Post $post)
{
$request->validate([
'title' => 'required|string|max:255',
'content' => 'required|string',
'category_id' => 'nullable|exists:categories,id',
'user_id' => 'required|exists:users,id',
]);

$post->update([
'title' => $request->title,
'slug' => Str::slug($request->title),
'content' => $request->content,
'category_id' => $request->category_id,
'user_id' => $request->user_id,
]);

return redirect()->route('admin.posts.index')->with('success', 'تم تحديث المقال بنجاح.');
}

public function destroy(Post $post)
{
$post->delete();
return redirect()->route('admin.posts.index')->with('success', 'تم حذف المقال بنجاح.');
}
}