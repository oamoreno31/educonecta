<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function createSlug($txt){
            $accents = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú"," "];
            $REPLACEaccents = ["a","e","i","o","u","a","e","i","o","u","_"];
    
            return strtolower(str_replace($accents, $REPLACEaccents, $txt));
        }
        request()->validate(Category::$rules);
        $category = Category::create([
            "name" => $request->name,
            "slug" => createSlug($request->name),
        ]);
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        function createSlug($txt){
            $accents = ["á","é","í","ó","ú","Á","É","Í","Ó","Ú"," "];
            $REPLACEaccents = ["a","e","i","o","u","a","e","i","o","u","_"];
    
            return strtolower(str_replace($accents, $REPLACEaccents, $txt));
        }
        request()->validate(Category::$rules);

        $category->update([
            "name" => $request->name,
            "slug" => createSlug($request->name),
        ]);
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
