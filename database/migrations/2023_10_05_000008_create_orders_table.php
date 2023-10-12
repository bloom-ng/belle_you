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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('payment_ref');
            $table->string('transaction_id');
            $table->string('state');
            $table->string('country');
            $table->decimal('discount');
            $table->enum('payments_status', [
                'successful',
                'pending',
                'failed',
            ]);
            $table->longText('payment_response');
            $table->tinyInteger('order_status');
            $table->decimal('shipping_total');

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
        Schema::dropIfExists('orders');
    }
};
