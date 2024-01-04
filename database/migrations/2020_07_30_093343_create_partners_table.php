<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('phone');
            $table->string('address');
            $table->string('commission');
        });
        DB::table('partners')->insert([
            [
                'full_name' => 'Леруа Мерлен Восток',
                'company_name' => 'Леруа Мерлен',
                'phone' => '0',
                'address' => '0',
                'commission' => '0',
            ],            [
                'full_name' => 'ОБИ',
                'company_name' => 'ОБИ',
                'phone' => '0',
                'address' => '0',
                'commission' => '0',
            ],            [
                'full_name' => 'Петрович',
                'company_name' => 'Петрович',
                'phone' => '0',
                'address' => '0',
                'commission' => '0',
            ],            [
                'full_name' => 'Касторама',
                'company_name' => 'Касторама',
                'phone' => '0',
                'address' => '0',
                'commission' => '0',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
