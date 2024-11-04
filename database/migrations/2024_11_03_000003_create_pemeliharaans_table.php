<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTimeTz('tanggalPemeliharan');
            $table->dateTimeTz('waktuMulaiPemeliharan');
            $table->string('periodePemeliharaan');
            $table->string('cuaca');
            $table->bigInteger('no_AlatUkur');
            $table->bigInteger('no_GSM');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('peralatan_telemetri_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
