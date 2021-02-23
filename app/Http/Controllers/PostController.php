<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use App\Comment;
use App\Tag;
use App\Image;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postValidation = [
        'title' => 'required|max:100',
        'subtitle' => 'required|max:80',
        'author' => 'required|max:40',
        'text' => 'required',
        'img' => 'required|max:255'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $images = Image::all();
        return view("posts.create", compact('tags', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($data["title"]);

        $request->validate($this->postValidation);

        $post = new Post();
        $post->fill($data);
        $postSave = $post->save();

        $data["post_id"] = $post->id;
        $infoPost = new InfoPost();
        $infoPost->fill($data);
        $infoPostSave = $infoPost->save();

        if($postSave && !empty($data["tags"])) {
            $post->tags()->attach($data["tags"]);
        }
        
        if($postSave && !empty($data["images"])) {
            $post->images()->attach($data["images"]);
        }


        return redirect()
            ->route("posts.index")
            ->with("success", "Post creato correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($data["title"]);

        $request->validate($this->postValidation);

        $post->update($data);

        $infoPost = $post->infoPost;
        $infoPost = InfoPost::where('post_id', $post->id)->first();
        $data["post_id"] = $post->id;
        $infoPost->update($data);

        if(empty($data["tags"])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data["tags"]);
        }

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post ' . $post->title . ' aggiornato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
        ->route('posts.index')
        ->with('deleted', 'Post ' . $post->title . ' eliminato correttamente');
    }
}
