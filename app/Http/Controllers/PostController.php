<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a paginated list of posts.
     * 
     * @param $tagName: Optionally view posts for a specific tag
     */
    public function index($tagName = null)
    {
        if ($tagName === null){
            $posts = Post::orderByDesc('pinned_position')->orderByDesc('posted_at')->simplePaginate(10);
        } else {
            $tag = Tag::where('name', '=', $tagName)->firstOrFail();
            $posts = Post::whereRelation('tags','id','=', $tag->id)->orderByDesc('pinned_position')->orderByDesc('posted_at')->simplePaginate(10);
        }
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
            'content' => 'required',
        ]);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->user_account_id = $request->user()->id;
        $p->posted_at = now();
        $p->save();
        
        // Skip first three values as they are not tags
        $values = array_slice($request->all(), 3);
        foreach (Tag::get() as $tag) {
            if (isset($values[$tag->name])) {
                $p->tags()->attach($tag);
            }
        }

        return redirect()->route('posts.show', ['post' => $p])->with('status', 'Post created!');
    }

    /**
     * Display a single post.
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
