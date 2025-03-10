<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
