<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        // Get all users and load its categories
        $users = User::with("categories")->select("id", "name", "slug", "image")->get();
        // Get the query string
        $queryString = $request->query();
        // Check if categories is a query field
        if (key_exists("categories", $queryString)) {
            // Filter users so that the result contains only users with the specified categories
            $users = $users->filter(function ($user) use($queryString) {
                $userCategories = $user->categories()->get();
                foreach($queryString["categories"] as $category) {
                    if ($userCategories->contains($category)) {
                        return true;
                    }
                }
                return false;
            });
        }
        return response()->json($users);
    }

    public function show($id) {
        // Get the user with the specified id
        $user = User::with("categories", "dishes")->select("id", "name", "slug", "description", "address", "image")->findOrFail($id);
        // Returns the user
        return response()->json($user);
    }

    public function dishesList($id) {
        // Get all dishes from this user
        $userDishes = Dish::where("user_id", $id)->where("visibility", 1)->get();
        // Maps the array to add types to each dish
        $userDishes->load("types");
        // Returns array containing all dishes
        return response()->json($userDishes);
    }
}
