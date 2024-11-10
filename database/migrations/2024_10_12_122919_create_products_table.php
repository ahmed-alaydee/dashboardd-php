<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title' , 300);
            $table->text('discription');
            $table->integer('price');
            $table->integer('qty');
            $table->text('image')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwpXlBbrnemR6Kbq4Fk5Hj6LeoCYLIXpuIlA&s');
            $table->float('discount')->nullable();
// =====================================
// لعمل الريلاشن
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
// =====================================


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     *    image
    *title
   * discription
*price
 *   qty
  *  discount
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
