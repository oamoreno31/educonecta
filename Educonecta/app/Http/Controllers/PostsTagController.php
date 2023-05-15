<?php

namespace App\Http\Controllers;

use App\Models\PostsTag;
use Illuminate\Http\Request;

/**
 * Class PostsTagController
 * @package App\Http\Controllers
 */
class PostsTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsTags = PostsTag::paginate();

        return view('posts-tag.index', compact('postsTags'))
            ->with('i', (request()->input('page', 1) - 1) * $postsTags->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postsTag = new PostsTag();
        return view('posts-tag.create', compact('postsTag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PostsTag::$rules);

        $postsTag = PostsTag::create($request->all());

        return redirect()->route('posts-tags.index')
            ->with('success', 'PostsTag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postsTag = PostsTag::find($id);

        return view('posts-tag.show', compact('postsTag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postsTag = PostsTag::find($id);

        return view('posts-tag.edit', compact('postsTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PostsTag $postsTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsTag $postsTag)
    {
        request()->validate(PostsTag::$rules);

        $postsTag->update($request->all());

        return redirect()->route('posts-tags.index')
            ->with('success', 'PostsTag updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $postsTag = PostsTag::find($id)->delete();

        return redirect()->route('posts-tags.index')
            ->with('success', 'PostsTag deleted successfully');
    }
}
