<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('blogs', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $blog->incrementViewCount();

        $comments = $blog->getApprovedComments();
        
        return view('blog-single', compact('blog', 'comments'));
    }

    public function storeComment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string'
        ]);

        $blog->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Yorumunuz başarıyla gönderildi ve onay bekliyor.');
    }
}
