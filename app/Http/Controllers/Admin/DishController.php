<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Type;
use Illuminate\Support\Facades\Storage;

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
        $dishes = Auth::user()->dishes;

        if (!$dishes->contains($id)){
            abort('401');
        }
        $dish = Dish::findOrFail($id);
        $dish->load("types");

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
            'image' => 'nullable|image',
            'visibility' => 'nullable|boolean'
        ]);
        
        $newDish = new Dish();
        $newDish->fill($validated);
        $newDish->user_id = Auth::user()->id;
        if (key_exists("image", $validated)) {
            $image = Storage::put("/img/dishes", $validated["image"]);
            $newDish->image = $image;
        }
        $newDish->save();
        
        
        if (key_exists("types", $validated)) {
            $newDish->types()->sync($validated['types']);
        } else {
            $newDish->types()->detach();
        }
        
        
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
        $dishes = Auth::user()->dishes;

        if (!$dishes->contains($id)){
            abort('401');
        }
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
            'image' => 'nullable|image',
            'visibility' => 'nullable|boolean'
        ]);
        
        $dish = Dish::findOrFail($id);
        
        if (key_exists("image", $validated)) {
            
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            
            $image = Storage::put("/img/dishes", $validated["image"]);
            $dish->image = $image;
        }

        if (!key_exists("visibility", $validated)){
            $dish->visibility = 0;
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
