<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();

        $post = Post::create($validatedData);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post créé avec succès!');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10); // 10 posts par page, triés par date
        return view('posts.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.edit', $post)
            ->with('success', 'Post mis à jour avec succès');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post supprimé avec succès');
    }

    public function create()
    {
        $posts = Post::latest()->paginate(10);
        if (!view()->exists('posts.create')) {
            abort(500, "La vue posts.create.blade.php est introuvable");
        }
        return view('posts.create', compact('posts'));
    }
}
