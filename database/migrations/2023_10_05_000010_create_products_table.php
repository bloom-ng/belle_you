<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
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
            $table->string('image_2')->nullable();
            $table->decimal('price');
            $table->longText('description');
            $table->enum('type', ['ready_made', 'custom']);
            $table->longText('short_description')->nullable();
            $table->decimal('shipping_fee')->default(0.0);
            $table->decimal('sale_price')->nullable();
            $table->date('sale_start')->nullable();
            $table->date('sale_end')->nullable();
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
};
