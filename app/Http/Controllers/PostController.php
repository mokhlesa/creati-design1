<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function index()
{
$posts = Post::whereNotNull('published_at')->with('user', 'category')->latest()->paginate(9);
return view('posts.index', compact('posts'));
}

public function show(Post $post)
{
// استخدام slug للبحث عن المقال
// Route model binding يعتني بهذا تلقائياً
if(is_null($post->published_at)){
abort(404);
}
return view('posts.show', compact('post'));
}
}