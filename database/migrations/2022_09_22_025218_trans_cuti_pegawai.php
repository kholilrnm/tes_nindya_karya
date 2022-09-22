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
        Schema::create('trans_cuti_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('id_pegawai')->length(50);
            $table->date('tgl_awal_cuti')->length(8);
            $table->date('tgl_akhir cuti')->length(8);
            $table->text('perihal_cuti');
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
