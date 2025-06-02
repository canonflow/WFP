<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function() {
    return view('index2');
})->name('index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view("/custom", "welcome");

// Route::get("/user/{id?}", function($id = "Default") {
//     return "User ID: $id";
// });

// ===== CARA 1 =====
// Route::get("/", function() {
//     return view("welcome");
// });

// Route::get("/{toko}", function($toko) {
//     return "Halaman <span style='color: red;'>$toko</span>";
// });

// Route::get('/{toko}/{product}', function($toko, $product) {
//     return "Halaman <span style='color: red;'>$toko</span> dengan produk <span style='color: blue;'>$product</span>";
// });

// ===== CARA 2 =====
// Route::get("/search", function() {
//     return "Halaman search";
// });

// Route::get("/register", function() {
//     return "Halaman register";
// });

// Route::get("/{toko?}/{product?}", function($toko = null, $product = null) {
//     if (!$toko) {
//         return view("welcome");
//     } else if (!$product) {
//         return "Halaman <span style='color: red;'>$toko</span>"; 
//     }

//     return "Halaman <span style='color: red;'>$toko</span> dengan produk <span style='color: blue;'>$product</span>";
// });

// ===== PRAKTIK 1 =====
// Route::get('/welcome', function() {
//     return "<h1>Selamat Datang</h1>";
// })->name('welcome');

// Route::get("before_order", function() {
//     return "<h1>Pilih DINE-IN atau TAKE AWAY</h1>";
// })->name("before-order");

// Route::get('menu/{type}', function($type) {
//     // $type = Str::title($type);
//     $type = (strtolower($type) == 'dinein') ? 'Dine-in' : 'Take-away';
//     return "<h1>Daftar menu $type</h1>";
// })->name('menu');

// Route::get('/admin/{page}', function($page) {
//     $page = ucfirst($page);
//     return "<h1>Portal Manajemen: Daftar $page</h1>";
// })->name('admin.page');

// ===== VIEW =====
Route::get('/home', function() {
    return view("home", [
        "name" => "Nathan Ganteng",
        "angka" => 1
    ]);
});

// ===== PRAKTIK 2 =====
// Route::get("/welcome", function() {
//     $link = route("order");
//     return "<h1>Splash screen: HealthyFood<br /><br /><a href='$link'>Start Order</a></h1>";
// });
Route::get("/welcome", [TestController::class, 'welcome'])
    ->name("welcome");

// Route::get("/before_order", function() {
    
// })->name("order");

Route::get("/before-order", [TestController::class, "beforeOrder"])
    ->name("order");

// Route::get("/menu/{type}", function($type) {
//     $type = strtolower($type);

//     if (in_array($type, ['dinein', 'takeaway'])) {
//         return view("menu", ['type' => $type]);
//     }
    
//     abort(404);
// })->name("menu");

Route::get("/menu/{type}", [TestController::class, "menu"])
    ->name("menu");

// Route::get('/admin/{page}', function($page) {
//     $page = ucfirst($page);
//     return "<h1>Portal Manajemen: Daftar $page</h1>";
// })->name('admin.page');

Route::get("/admin/{page}", [TestController::class, "admin"])
    ->name("admin.page");

Route::resource("categories", CategoryController::class);

Route::resource('foods', FoodController::class);

Route::get('/test', [TestController::class, 'testQuery']);


// Route::get("/category/showTotalFoods", [CategoryController::class, 'showTotalFoods']);

Route::post('/category/showListFoods/{category}', [CategoryController::class, 'showListFoods'])
    ->name('category.showListFoods');
Route::post('/categories/{category}/restore', [CategoryController::class, 'restore'])
    ->name('categories.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
