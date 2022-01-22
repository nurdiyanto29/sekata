<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_perform');
            $table->time('jam');
            $table->string('alamat');
            $table->string('status');
            $table->string('acara');
            $table->string('hp');
            $table->integer('tipe_id');
            $table->integer('user_id');
            $table->timestamp('time')->default(now());
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
        Schema::dropIfExists('jadwals');
    }
}
