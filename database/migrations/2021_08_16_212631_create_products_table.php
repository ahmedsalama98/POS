<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('products', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('category_id');
    //         $table->string('name');
    //         $table->text('description');
    //         $table->double('purchese_price' , 8 , 2);
    //         $table->double('sale_price' , 8 , 2);
    //         $table->double('stock' , 8 , 2);
    //         $table->text('image')->default('default.png');
    //         $table->timestamps();
    //         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    //     });
    // }

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('ar_description');
            $table->text('en_description');
            $table->double('purchese_price' , 8 , 2);
            $table->double('sale_price' , 8 , 2);
            $table->double('stock' , 8 , 2);
            $table->text('image')->default('default.png');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
