<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->text('products');//selling_price, quantity, product_name
            $table->double('discount')->default(0);
            $table->string('total')->nullable();
            $table->string('method_of_payment')->nullable();
            $table->string('customer_phone')->nullable();
            $table->boolean('is_having_debts')->default(false);
            $table->string('debt_id')->unique()->nullable();
            $table->double('debt_balance')->default(0);
            $table->boolean('on_hold')->default(false);
            $table->unsignedBigInteger('reg_by');
            $table->foreign('reg_by')->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
};
