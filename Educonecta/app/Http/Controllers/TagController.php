<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate();

        return view('tag.index', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * $tags->perPage());
    }

    public function create()
    {
        $tag = new Tag();
        return view('tag.create', compact('tag'));
    }

    public function store(Request $request)
    {
        function createSlug($txt){
            $accents = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú"," "];
            $REPLACEaccents = ["a","e","i","o","u","a","e","i","o","u","_"];

            return strtolower(str_replace($accents, $REPLACEaccents, $txt));
        }
        request()->validate(Tag::$rules);

        $tag = Tag::create([
            "name" => $request->name,
            "slug" => createSlug($request->name),
        ]);

        return redirect()->route('tags.index')
            ->with('success', 'Tag creada con éxito.');
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tag.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        function createSlug($txt){
            $accents = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú"," "];
            $REPLACEaccents = ["a","e","i","o","u","a","e","i","o","u","_"];

            return strtolower(str_replace($accents, $REPLACEaccents, $txt));
        }
        request()->validate(Tag::$rules);

        $tag->update([
            "name" => $request->name,
            "slug" => createSlug($request->name),
        ]);

        return redirect()->route('tags.index')
            ->with('success', 'Tag actualizada correctamente.');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id)->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Tag eliminada con éxito.');
    }
}
