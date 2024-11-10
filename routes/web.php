<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group(function(){




    Route::get("/admin", [AdminController::class, 'index'])->name('adminhome');

    Route::get("/products", [AdminController::class, 'viewproducts'])->name('viewallproducts');


    // start update
    Route::get("/createproduct", [AdminController::class, 'create'])->name('createproduct');

    //  start delete
    Route::delete("/delete/{id}", [AdminController::class, 'deletproduct'])->name('deletproduct');

    Route::post("/storproduct", [AdminController::class, 'store'])->name('storproduct');

    Route::get("/editproduct/{id}", [AdminController::class, 'edit'])->name('editproduct');
    Route::put("/updateproduct/{id}", [AdminController::class, 'update'])->name('updateproduct');



    // هنا هبدا اكريت كل الروتات بتاعت ال كاتيجوري زي ال برودطت بس عن طريق كود واحد لان هوا هيكريتهم لوحدو ا


    Route::resource('category', CategoryController::class);



});
