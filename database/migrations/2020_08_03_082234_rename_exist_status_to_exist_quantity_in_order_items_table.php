<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameExistStatusToExistQuantityInOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('exist_status', 'stock_quantity');
            $table->renameColumn('process_status', 'status');
        });
        \App\OrderItem::all()->each(function ($item) {
           $item->stock_quantity = $item->quantity;
           $item->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('stock_quantity', 'exist_status');
            $table->renameColumn('status', 'process_status');
        });
        \App\OrderItem::all()->each(function ($item) {
            $item->exist_status = 1;
            $item->save();
        });
    }
}
