<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountPaidAndDeliveryDateColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('amount_paid')->default(0);
            $table->date('delivery_date')->nullable();
        });
        \App\Order::all()->each(function ($order) {
           $order->amount_paid = $order->getSum();
           $order->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('amount_paid');
            $table->dropColumn('delivery_date');
        });
    }
}
