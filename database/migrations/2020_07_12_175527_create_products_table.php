<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ps_id')->unsigned();
            $table->string('p_name');
            $table->integer('p_qty');
            $table->float('p_price');
            $table->json('p_images');
            $table->json('p_tags')->nullable();
            $table->string('p_description');
            $table->json('offer')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('ps_id')->references('ps_id')->on('product_subcategory');
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
