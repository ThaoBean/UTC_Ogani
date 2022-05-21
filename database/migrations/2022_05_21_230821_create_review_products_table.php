<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('order_detail_id');
            $table->Integer('quantity_star');
            $table->longText('review');
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
        Schema::dropIfExists('review_products');
    }
}
