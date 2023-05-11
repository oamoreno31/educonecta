<?php

namespace App\Http\Controllers;

use App\Models\PostsCategory;
use Illuminate\Http\Request;

/**
 * Class PostsCategoryController
 * @package App\Http\Controllers
 */
class PostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsCategories = PostsCategory::paginate();

        return view('posts-category.index', compact('postsCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $postsCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postsCategory = new PostsCategory();
        return view('posts-category.create', compact('postsCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PostsCategory::$rules);

        $postsCategory = PostsCategory::create($request->all());

        return redirect()->route('posts-categories.index')
            ->with('success', 'PostsCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postsCategory = PostsCategory::find($id);

        return view('posts-category.show', compact('postsCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postsCategory = PostsCategory::find($id);

        return view('posts-category.edit', compact('postsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PostsCategory $postsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsCategory $postsCategory)
    {
        request()->validate(PostsCategory::$rules);

        $postsCategory->update($request->all());

        return redirect()->route('posts-categories.index')
            ->with('success', 'PostsCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $postsCategory = PostsCategory::find($id)->delete();

        return redirect()->route('posts-categories.index')
            ->with('success', 'PostsCategory deleted successfully');
    }
}
