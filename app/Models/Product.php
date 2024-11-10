<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'discription',
       'price',
       'qty',
       'discount',
       'image',
        'category_id',

    ];


    function category(){
        return $this->belongsTo(Category::class);
    }

}

