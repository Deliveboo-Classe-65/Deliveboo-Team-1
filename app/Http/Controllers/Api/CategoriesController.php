<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        // Get all categories
        $categories = Category::all();
        // Returns array containing all categories
        return response()->json($categories);
    }
}
