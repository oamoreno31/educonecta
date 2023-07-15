<?php

namespace App\Http\Controllers;

use App\Models\PostFile;
use Illuminate\Http\Request;
use App\Http\DAO\PostFileDao;

/**
 * Class PostFileController
 * @package App\Http\Controllers
 */
class PostFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postFiles = PostFile::paginate();

        return view('post-file.index', compact('postFiles'))
            ->with('i', (request()->input('page', 1) - 1) * $postFiles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postFile = new PostFile();
        return view('post-file.create', compact('postFile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PostFile::$rules);

        // $postFile = PostFile::create($request->all());
        $postFile = PostFileDao::NewPostFile($request)->detail;

        return redirect()->route('post-files.index')
            ->with('success', 'PostFile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $postFile = PostFile::find($id);
        $postFile = PostFileDao::SearchById($id)->detail;

        return view('post-file.show', compact('postFile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $postFile = PostFile::find($id);
        $postFile = PostFileDao::SearchById($id)->detail;

        return view('post-file.edit', compact('postFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PostFile $postFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostFile $postFile)
    {
        request()->validate(PostFile::$rules);

        // $postFile->update($request->all());
        PostFileDao::UpdatePostFile($postFile, $request)->detail;
        return redirect()->route('post-files.index')
            ->with('success', 'PostFile updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $postFile = PostFile::find($id)->delete();
        $postFile = PostFileDao::DeletePostFile($id)->detail;

        return redirect()->route('post-files.index')
            ->with('success', 'PostFile deleted successfully');
    }
}
