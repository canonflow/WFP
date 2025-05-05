<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $foods = Food::all();
        $foods = Food::with('category')->get();
        
        return view("foods.index", compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('foods.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('food');
        $nutritional_fact = $request->get('nutritional_fact');
        $description = $request->get('description');
        $price = floatval($request->get('price'));
        $category_id = $request->get('category_id');

        Food::create([
            'name' => $name,
            'nutritional_fact' => $nutritional_fact,
            'description' => $description,
            'price' => $price,
            'category_id' => $category_id
        ]);

        return redirect()
            ->route('foods.index')
            ->with('status', 'New food added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }
}
