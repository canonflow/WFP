<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // /categories
        $categories = $this->showTotalFoods();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // /categories/create
        return "INI FORM CREATE";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // /categories/{id}
        return "INI SHOW $id";
    }

    public function showTotalFoods()
    {

        // ==== CARA 1 =====
        // $totalFoods = Category::leftJoin('foods', 'categories.id', '=', 'foods.category_id')
        //                     ->select(["categories.name as category", DB::raw('ifnull(count(foods.name), 0) as total')])
        //                     ->groupBy('category')
        //                     ->get();

        // return $totalFoods;

        // ===== CARA 2 =====
        $totalFoods = Category::with('foods')->get();
        
        $temp = [];

        foreach($totalFoods as $f) {
            $temp[] = ['category' => $f, 'total' => count($f->foods), 'foods' => $f->foods, 'id' => $f];
        }

        // return $totalFoods;
        return $temp;
    }

    public function showListFoods(Category $category)
    {
        $name = $category->name;
        $data = $category->foods;

        return response()->json([
            'status' => "oke",
            'title' => $name . " Food List",
            'body' => view('categories.showListFood', compact('name', 'data'))->render() 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // /categories/{id}/edit
        return "INI EDIT $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
