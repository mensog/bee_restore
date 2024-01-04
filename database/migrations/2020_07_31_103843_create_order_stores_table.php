<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->string('status');
            $table->string('store_order_id')->nullable();
        });
        \App\Models\Order::all()->each(function ($order) {
            $order->fillOrderStores();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_stores');
    }
}
