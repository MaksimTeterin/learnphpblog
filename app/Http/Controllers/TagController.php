<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $posts = Post::all();
    return view('tags.create', compact('posts'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id', 
        ]);
        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);
        $post->tags()->sync($validated['tags']);
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag')); // Return a view to show the tag
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag')); // Return a view for editing the tag
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array|exists:tags,id',
        ]);
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
        $post->tags()->sync($validated['tags'] ?? []);
        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')
                         ->with('success', 'Tag deleted successfully.');
    }
}