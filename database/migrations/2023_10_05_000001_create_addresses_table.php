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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code')->nullable();
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('phone');
            $table->string('phone_2')->nullable();

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
        Schema::dropIfExists('addresses');
    }
};
