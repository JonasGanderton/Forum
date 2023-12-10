<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use paginate() if I have a way to format the buttons it inserts
        $posts = Post::orderByDesc('pinned_position')->orderByDesc('posted_at')->simplePaginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required', // May not be required once pictures are added.
            // TODO: validate tags
        ]);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->user_account_id = 1; // TODO: Replace with logged in user
        $p->posted_at = now();
        $p->save();
        
        // Save the Post first, as Post id required by post_tag table
        
        // TODO: allow user to add tags
        $p->tags()->attach(Tag::find(1));

        session()->flash('message', 'Post was created.');

        return redirect()->route('posts.show', ['post' => $p]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
