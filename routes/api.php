<?php

use App\Http\Controllers\Api\productController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/hi" , function(){

    return "Hi ahmed . we make api" ;
});

// all product
Route::get('/allproduct' , [productController::class , 'getallproduct']);

//  one product
Route::get('/product/{id}', [productController::class , 'getoneproduct']);

// get all by category
Route::get('/productcategory/{id}', [productController::class, 'getproductcategory']);

Route::post('/addproduct', [productController::class, 'addproduct']);
