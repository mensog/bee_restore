<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('parse_url')->nullable()->change();
            $table->string('store_id')->nullable()->change();
            $table->integer('move_to')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('visible')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('parse_url')->nullable(false)->change();
            $table->string('store_id')->nullable(false)->change();
            $table->dropColumn('move_to');
            $table->dropColumn('parent');
            $table->dropColumn('visible');
        });
    }
}
