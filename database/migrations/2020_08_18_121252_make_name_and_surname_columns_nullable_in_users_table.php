<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNameAndSurnameColumnsNullableInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('surname')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            if (is_null($user->name)) {
                $user->name = '';
            }
            if (is_null($user->surname)) {
                $user->surname = '';
            }
            $user->save();
        }
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('surname')->nullable(false)->change();
        });
    }
}
