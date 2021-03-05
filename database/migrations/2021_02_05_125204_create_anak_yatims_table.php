<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakYatimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak_yatims', function (Blueprint $table) {
            $table->id('id_anak');
            $table->string('nama_anak')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_bapak')->nullable();
            $table->string('alamat')->nullable();
            $table->char('no_hp_orang_tua',12)->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->string('delete_by')->nullable();
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('anak_yatims');
    }
}
