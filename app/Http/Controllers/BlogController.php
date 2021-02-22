<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    // Detaglio Articolo Frontend
    public function show($slug) {
       $post =  Post::where('slug', $slug)->firstOrFail();

       return view('post', compact('post'));
    } 

    //Aggiunta commento
    public function addComment(Request $request, $id) {
        $data = $request->all();
        $data["post_id"] = $id;

        $newComment = new Comment();
        $newComment->fill($data);

        $newComment->save();

        $post = Post::findOrFail($id);

        return redirect()
            ->route('post', $post->slug);
    }
}
