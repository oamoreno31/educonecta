<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = Like::paginate();

        return view('like.index', compact('likes'))
            ->with('i', (request()->input('page', 1) - 1) * $likes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $like = new Like();
        return view('like.create', compact('like'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Like::$rules);

        $like = Like::create($request->all());

        return redirect()->route('likes.index')
            ->with('success', 'Like created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $like = Like::find($id);

        return view('like.show', compact('like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $like = Like::find($id);

        return view('like.edit', compact('like'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Like $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        request()->validate(Like::$rules);

        $like->update($request->all());

        return redirect()->route('likes.index')
            ->with('success', 'Like updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $like = Like::find($id)->delete();

        return redirect()->route('likes.index')
            ->with('success', 'Like deleted successfully');
    }
}
