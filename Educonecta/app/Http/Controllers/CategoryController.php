<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\DAO\CategoryDao;

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
        request()->validate(Category::$rules);

        $category = CategoryDao::NewCategory($request);
        if ($category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Category created successfully.');
        } else {
            return redirect()->route('categories.create', compact('request'))
                ->with('error', $category->message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Category::find($id);
        $category = CategoryDao::SearchById($id);

        if ($category->success == true) {
            return view('category.show', compact('category'));
        } else {
            // return view('category.show', compact('category'));
            return redirect()->route('category.show')
                ->with('error', $category->message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category = Category::find($id);
        $category = CategoryDao::SearchById($id);
        if ($category->success == true) {
            $category = $category->detail;
            return view('category.edit', compact('category'));
        } else {
            return redirect()->route('categories.index')
                ->with('error', $category->message);
        }
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
        request()->validate(Category::$rules);
        $_category = CategoryDao::updateCategory($request, $category);
        if ($_category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Category updated successfully');
        } else {
            return redirect()->route('categories.edit', compact("category"))
                ->with('error', $_category->message);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $category = Category::find($id)->delete();
        $category = CategoryDao::DeleteCategory($id);
        if ($category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('categories.index')
                ->with('error', $category->message);
        }
    }
}
