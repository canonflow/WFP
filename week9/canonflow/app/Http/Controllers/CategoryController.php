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
        return view("categories.create");
        // return "INI FORM CREATE";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->get('category');
        $image = $request->file('image');

        $imageName = strtolower($category) . "." . $image->getClientOriginalExtension();
        $image->storeAs(
            'categories',
            $imageName,
            'public'
        );

        Category::create([
            'name' => $request->get('category'),
            'image' => $imageName
        ]);

        return redirect()
            ->route('categories.index')
            ->with('status', 'New category added successfully!');
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
        $totalFoods = Category::withTrashed()->with('foods')->get();
        
        $temp = [];

        foreach($totalFoods as $f) {
            $temp[] = ['category' => $f, 'total' => count($f->foods), 'foods' => $f->foods, 'id' => $f, 'isDeleted' => $f->deleted_at];
        }

        // dd($temp);

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
    public function edit(Category $category)
    {
        // /categories/{id}/edit
        // return "INI EDIT $id";
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $name = $request->get('category');
        $imageName = $category->image;
        // dd($category->image);
        
        // Check gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = strtolower($name) . "." . $image->getClientOriginalExtension();
            $image->storeAs(
                'categories',
                $imageName,
                'public'
            );
        }

        $category->image = $imageName;
        $category->name = $name;
        $category->save();

        return redirect()
            ->route('categories.index')
            ->with('status', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category);
        try {
            $name = $category->name;
            $category->delete();
            return redirect()
                ->route('categories.index')
                ->with('status', "Category ($name) deleted successfully!");
        } catch(\PDOException $ex) {
            $msg = "Make sure there is no related data before delete it. Please contact Administrator to know more about it!";
            return redirect()
                ->route('categories.index')
                ->with('error', $msg);
        }
    }

    public function restore(string $category) 
    {
        $category = Category::withTrashed()->findOrFail($category);

        $category->restore();
        return redirect()
                ->route('categories.index')
                ->with('status', "Category ({$category->name}) restored successfully!");
    }
}
