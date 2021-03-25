<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dxf_invoices', function (Blueprint $table) {
           $table->increments('id');
           $table->string('email', 100);
           $table->integer('value');
           $table->date('expireat');
           $table->integer('status');
           $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dxf_invoices');
    }
}
