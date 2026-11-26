<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Notifications\ReplytoPost;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:2000'],
        ]);

        $comment = $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $validated['body'],
        ]);

        $comment->load('user');

        if ($post->user && $post->user_id !== $request->user()->id) {
            $post->user->notify(
                new ReplytoPost($post, $request->user()->name)
            );
        }

        if ($request->expectsJson()) {
            return response()->json([
                'comment' => [
                    'id' => $comment->id,
                    'body' => $comment->body,
                    'created_at_human' => $comment->created_at?->diffForHumans() ?? 'just now',
                    'user_name' => $comment->user?->name ?? 'Driver',
                    'user_url' => $comment->user ? route('users.show', $comment->user) : null,
                ],
                'comments_count' => $post->comments()->count(),
            ], 201);
        }

        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $user = auth()->user();

        if (! $user || ($user->id !== $comment->user_id && ! $user->isAdmin())) {
            abort(403);
        }

        $validated = $request->validate([
            'body' => ['required', 'string', 'max:2000'],
        ]);

        $comment->update([
            'body' => $validated['body'],
        ]);

        return redirect()->route('posts.show', ['id' => $comment->post_id]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $user = auth()->user();

        if (! $user || ($user->id !== $comment->user_id && ! $user->isAdmin())) {
            abort(403);
        }

        $postId = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', ['id' => $postId]);
    }
}