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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->string('ref');
            $table->decimal('amount', 10, 2);
            $table->enum('type', [
                'purchase',
                'refund',
                'wallet funding',
                'payout',
            ]);
            $table->enum('status', ['succcessful', 'pending', 'failed']);
            $table->enum('payment_method', ['card', 'transfer']);

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
        Schema::dropIfExists('transactions');
    }
};
