<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('line_item');
            $table->string('status');
            $table->string('billed_to_line_1');
            $table->string('billed_to_line_2');
            $table->string('account_name');
            $table->bigInteger('account_number');
            $table->string('bank_name');
            $table->decimal('service_charge');
            $table->decimal('vat');

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
        Schema::dropIfExists('invoices');
    }
}
