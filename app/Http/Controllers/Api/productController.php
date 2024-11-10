<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    // Get All Products
    //هنا انا عايز اجيب كل المنتجات
    function getallproduct(){

        $products = Product::with('category')->get();

        return $products ;

    }

    // Get one product
    //في حاله اني عايز اجيب منتج واحد
    function getoneproduct($id)
    {

        $product = Product::with('category')->find($id);

        return $product;
    }

    // get all product category
    function getproductcategory($id){

        $product = Product::with('category')->where('category_id' , $id)->get();

        return $product;

    }






    function addproduct(Request $request)
    {


        // validation
        //هيا فانكشن بعملها علشان لو العميلمضفش حاجه يطلبها منوا في نفس الوقت متظهرش الايرور


        $request->validate([
            // دي عباره عن شرط

            "title" => "required | min:4 ",
            "discription" => "required | min:4 ",
            "price" => "required | integer ",
            // "image" => "required ",


        ]);

        $input  =  $request->except('image');

        ///هاخد منوا الصوره
        if ($request->hasFile('image')) {
            $imagefile = $request->image;
            $imageext = $imagefile->getClientOriginalExtension();
            $newimagename = uniqid() . ".$imageext";

            $imagefile->move("images/", $newimagename);

            $path = "images/$newimagename ";

            $input['image'] = $path;


            //  dd($path);
        }

       $product = Product::create($input);

        return $product->id ;
    }








}
