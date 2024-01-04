<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            Schema::table('partners', function (Blueprint $table) {
                $table->string('image_path')->nullable();
            });
            $leroy = \App\Partner::find(1);
            $leroy->image_path = '/svg/shop-icons/leroy-merlin.svg';
            $leroy->save();
            $obi = \App\Partner::find(2);
            $obi->image_path = '/svg/shop-icons/obi.svg';
            $obi->save();
            $petrovich = \App\Partner::find(3);
            $petrovich->image_path = '/svg/shop-icons/petrovich.svg';
            $petrovich->save();
            $castorama = \App\Partner::find(4);
            $castorama->image_path = '/svg/shop-icons/castorama.svg';
            $castorama->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
