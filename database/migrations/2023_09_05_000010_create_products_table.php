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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('quantity');
            $table->string('image');
            $table->string('image_2');
            $table->decimal('price');
            $table->longText('description');
            $table->tinyInteger('type');
            $table->longText('short_description');
            $table->decimal('sale_price');
            $table->date('sale_start');
            $table->date('sale_end');
            $table->decimal('shipping_fee');
            $table->string('slug');

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
        Schema::dropIfExists('products');
    }
}
