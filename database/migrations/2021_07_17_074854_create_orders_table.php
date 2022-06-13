<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names');
            $table->string('order_number')->unique();
            $table->string('phone_number');
            $table->string('mode_of_delivery');
            $table->string('location')->nullable();
            $table->string('cart')->length(1000);
            $table->string('total');
             $table->string('item_count');
             $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->enum('delivery_status', ['yes', 'no'])->default('no');
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
}
