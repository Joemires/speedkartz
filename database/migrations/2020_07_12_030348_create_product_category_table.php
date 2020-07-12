<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('pc_id');
            $table->string('pc_name');
            $table->json('pc_images');
            // $table->json('pc_tags');
            $table->json('pc_captions');
            $table->string('pc_description');
            $table->timestamps();
        });

        Schema::table('product_category', function($table) {
            $table->unique('pc_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
