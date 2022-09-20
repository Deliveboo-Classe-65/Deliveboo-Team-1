<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Type;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Auth::user()->dishes;
        
        return view('admin.dishes.index', compact('dishes'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::findOrFail($id);

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view("admin.dishes.create", compact("types"));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|min:4|max:255",
            'price' => "required",
            'description' => "required|min:10|max:300",
            'types' => "nullable",
        ]);
        
        $newDish = new Dish();
        $newDish->fill($validated);
        $newDish->user_id = Auth::user()->id;
        $newDish->save();
        
        $newDish->types()->sync($validated['types']);
        
        
        return redirect()->route('admin.dishes.show', $newDish->id);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $types = Type::all();
        
        return view("admin.dishes.edit", compact("dish", "types"));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => "required|min:4|max:255",
            'price' => "required",
            'description' => "required|min:10|max:300",
            'types' => "nullable",
        ]);
        
        $dish = Dish::findOrFail($id);
        
        if (key_exists("image", $validated)) {
            
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            
            $image = Storage::put("/dishes", $validated["image"]);
            $dish->image = $image;
        }
        
        $dish->update($validated);
        if (key_exists("types", $validated)) {
            $dish->types()->sync($validated['types']);
        } else {
            $dish->types()->detach();
        }
        
        return redirect()->route("admin.dishes.show", $dish->id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        $dish->delete();

        return redirect()->route("admin.dishes.index");
    }
}
