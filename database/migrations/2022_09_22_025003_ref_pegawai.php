<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->length(50);
            $table->string('name')->length(255);
            $table->string('email')->length(50);
            $table->text('address')->length(255);
            $table->integer('id_jabatan')->length(8);
            $table->integer('jenis_kelamin')->length(8);
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
        //
    }
};
