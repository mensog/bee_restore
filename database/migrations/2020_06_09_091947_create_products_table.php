<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sku');
            $table->string('name');
            $table->integer('store_id');
            $table->string('friendly_url_name')->unique();
            $table->string('parse_url');
            $table->integer('price');
            $table->string('img_url')->nullable();
            $table->text('description')->nullable();
            $table->string('weight')->nullable();

            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
}
