<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugColumnToPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
        $leroy = \App\Partner::find(1);
        $leroy->slug = 'leroy-merlin';
        $leroy->save();
        $obi = \App\Partner::find(2);
        $obi->slug = 'obi';
        $obi->save();
        $petrovich = \App\Partner::find(3);
        $petrovich->slug = 'petrovich';
        $petrovich->save();
        $castorama = \App\Partner::find(4);
        $castorama->slug = 'castorama';
        $castorama->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
