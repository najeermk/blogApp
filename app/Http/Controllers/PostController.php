<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function createPage() {
        return view('post.create');
    }

    public function store(Request $request) {
        $inputFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $inputFields['title'] = strip_tags($inputFields['title']);
        $inputFields['body'] = strip_tags($inputFields['body']);
        $inputFields['user_id'] = auth()->id();

        $newPost = Post::create($inputFields);

        return redirect("/")->with('success', 'New post successfully created.');
    }

    public function show(Post $post) {
        return view('post.show', ['post' => $post]);
    }
}
