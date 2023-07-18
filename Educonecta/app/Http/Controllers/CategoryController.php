<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\DAO\CategoryDao;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate();

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = CategoryDao::NewCategory($request);
        if ($category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Categoría creada con éxito');
        } else {
            return redirect()->route('categories.create', compact('request'))
                ->with('error', $category->message);
        }
    }

    public function show($id)
    {
        $category = CategoryDao::SearchById($id);
        if (isset($category) && $category->success == true) {
            $category = $category->detail;
            return view('category.show', compact('category'));
        } else {
            return redirect()->route('category.show')
                ->with('error', $category->message);
        }
    }

    public function edit($id)
    {
        $category = CategoryDao::SearchById($id);
        if ($category->success == true) {
            $category = $category->detail;
            return view('category.edit', compact('category'));
        } else {
            return redirect()->route('categories.index')
                ->with('error', $category->message);
        }
    }

    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);
        $_category = CategoryDao::updateCategory($request, $category);
        if ($_category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Categoría actualizada con éxito');
        } else {
            return redirect()->route('categories.edit', compact("category"))
                ->with('error', $_category->message);
        }
    }

    public function destroy($id)
    {
        $category = CategoryDao::DeleteCategory($id);
        if ($category->success == true) {
            return redirect()->route('categories.index')
                ->with('success', 'Categoría eliminada con éxito');
        } else {
            return redirect()->route('categories.index')
                ->with('error', $category->message);
        }
    }
}
