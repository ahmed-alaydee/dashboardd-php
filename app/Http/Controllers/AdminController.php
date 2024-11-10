<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    // ====================================================================

    function index (){
        return view('admin.index');
    }

    // ====================================================================


  function create() {
    $categores = Category::all();

    return view('admin.product.create' ,compact('categores'));

    }



    // ====================================================================

    function viewproducts() {
        // في حاله اني عايز لبعت معاه بيانات
        $products = Product::all();

        return view('admin.product.index', compact('products') );
    }


    // ====================================================================


// start function delete
    function deletproduct($id)
    {
        // dd($id);
     Product::find($id)->delete();
    return back();

// return redirect()->route('viewallproducts');
    }


// ====================================================================



function store (Request $request ){


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
if($request->hasFile('image')){
    $imagefile = $request->image;
    $imageext = $imagefile->getClientOriginalExtension();
    $newimagename= uniqid() . ".$imageext";

$imagefile->move("images/" , $newimagename );

$path = "images/$newimagename ";

$input['image'] = $path;


    //  dd($path);
}



      Product::create($input);

        return redirect()->route('viewallproducts');

    }

    // =================================================================

    // dtart edit product

function edit ($id){
    $product = Product::find($id);
        $categores = Category::all();
    return view('admin.product.edit' , compact('product', 'categores')) ;
}





// ====================================================================

//  dtart update product
function update(Request $request, $id){


    //validation
$request->validate([

            "title" => "required | min:4 ",
            "discription" => "required | min:4 ",
            "price" => "required | integer ",


]);

    $input  =  $request->except('image');

///هاخد منوا الصوره
if($request->hasFile('image')){
    $imagefile = $request->image;
    $imageext = $imagefile->getClientOriginalExtension();
    $newimagename= uniqid() . ".$imageext";

$imagefile->move("images/" , $newimagename );

$path = "images/$newimagename ";

$input['image'] = $path;


    //  dd($path);
}



        $product =  Product::find($id);
        $product->update($input);
        return redirect()->route('viewallproducts');


}


}


// ====================================================================
