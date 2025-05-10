<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($postId)
    {
        // $comments = Comment::where('post_id')->latest()->paginate(10);  
        $comments = Comment::all();
        return view('posts.comments.show', compact('comments'));
    }

    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);
        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        }
        return redirect()->back()->with('error', 'Comment not found');
    }
}
