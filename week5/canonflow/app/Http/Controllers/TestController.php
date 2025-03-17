<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function welcome() 
    {
        $link = route("order");
        return "Tampilan Splash Screen dengan Judul Aplikasi, Deskripsi, dan ada tombol <a href=\"$link\">Start Order</a>";
    }

    public function beforeOrder()
    {
        $linkDinein = route("menu", ['type' => 'dinein']);
        $linkTakeaway = route("menu", ['type' => 'takeaway']);
        return "<a href='$linkDinein'>Dine In</a><br /><a href='$linkTakeaway'>Take Away</a>";
    }

    public function menu($type)
    {
        $type = strtolower($type);

        if (in_array($type, ['dinein', 'takeaway'])) {
            return view("menu", ['type' => $type]);
        }
        
        abort(404);
    }

    public function admin($page)
    {
        $page = ucfirst($page);
        return "<h1>Portal Manajemen: Daftar $page</h1>";
    }

    public function testQuery()
    {
        // dd();
        // RAW
        $data = DB::select("select * from foods where price > 50000");

        // QUERY BUILDER
        $data = DB::table('foods')
                    ->where('price', '>', 50000)
                    ->get();

        // ELOQUENT
        $data = Food::query()
                    ->where('price', '>', 50000)
                    ->get();

        // LIMIT and OFFSET
        $data = Food::query()
                    ->offset(10)
                    ->limit(5)
                    ->get();

        // GROUP BY
        $data = Food::select(["category_id", DB::raw('count(*) as count')])
                    ->groupBy("category_id")
                    ->having("count", ">", 15)
                    ->get();

        // INNER JOIN
        $data = Food::join('categories', 'foods.category_id', '=', 'categories.id')
                    ->select(["foods.name as food_name", "foods.price", "categories.name as category"])
                    ->get();

        return response()->json($data);
    }
}
