<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPromotionFixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_promotion_fixes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('promotion_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('images');
            $table->string('price');
            $table->string('diskon');
            $table->string('persen');
            $table->string('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_promotion_fixes');
    }
}
