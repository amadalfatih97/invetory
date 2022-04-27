<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *'kode','iduser','kodebarang','qty','status','tanggalkeluar'
     * @return void
     */
    public function up()
    {
        Schema::create('keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',12);
            $table->string('iduser',12);
            $table->string('kodebarang',12);
            $table->integer('qty')->lenght(4)->unsigned();
            $table->date('status');
            $table->date('tanggalkeluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluars');
    }
}
