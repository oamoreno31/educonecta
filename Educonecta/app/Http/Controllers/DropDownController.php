<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class DropDownController
 * @package App\Http\Controllers
 */
class DropDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchCategory()
    {
        $data['categories'] = Category::get(["name", "id"]);
        return response()->json($data);
    }
}
