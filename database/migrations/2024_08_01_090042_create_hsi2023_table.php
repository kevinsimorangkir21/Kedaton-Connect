<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsi2023Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsi2023', function (Blueprint $table) {
            $table->id();
            $table->string('BULAN');
            $table->date('TGL BAGI WO');
            $table->string('STO');
            $table->string('STATUS');
            $table->text('KETERANGAN')->nullable();
            $table->string('MITRA')->nullable();
            $table->string('SEGMEN')->nullable();
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
        Schema::dropIfExists('hsi2023');
    }
}
