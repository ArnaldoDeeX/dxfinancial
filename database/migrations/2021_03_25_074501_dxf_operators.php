<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DxfOperators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dxf_operators', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name', 100);
           $table->string('email', 100);
           $table->string('password');
        });

        DB::table('dxf_operators')->insert([
            'name' => 'Operador Padrão',
            'email' => 'dxf@default.com',
            'password' => '123'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dxf_operators');
    }
}
