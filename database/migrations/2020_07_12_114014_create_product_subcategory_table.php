<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategory', function (Blueprint $table) {
            $table->increments('ps_id', true);
            $table->integer('pc_id')->unsigned();
            $table->string('ps_name');
            $table->json('ps_images');
            // $table->json('ps_tags');
            $table->json('ps_captions')->nullable();
            $table->string('ps_description');
            $table->timestamps();
        });

        Schema::table('product_subcategory', function($table) {
            $table->foreign('pc_id')->references('pc_id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subcategory');
    }
}
