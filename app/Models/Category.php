<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



protected $fillable =['name'];




// functionهنا انا عايز اعمل في الفونكشن دي اني اقول للكاتيجوري انت عندك منتجات كتسر
// انت بتنتمي لقسم معين
//من الاخر هنا انا بقول في الفونكشن دي ان الكاتيجوري الي فوق ده عندوا كتير من البرودكت ده


function product() {

    return $this->hasMany(Product::class , 'category_id');
}


}
