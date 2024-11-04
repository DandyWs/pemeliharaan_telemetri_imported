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
        Schema::create('komponens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaKomponen');
            $table->boolean('indikatorLED')->nullable();
            $table->boolean('simCard')->nullable();
            $table->boolean('kondisiAlat')->nullable();
            $table->boolean('sambunganKabel')->nullable();
            $table->boolean('perawatanSonde')->nullable();
            $table->boolean('testDanSettingRTC')->nullable();
            $table->boolean('levelAirAki')->nullable();
            $table->bigInteger('teganganBateraiAki')->nullable();
            $table->unsignedBigInteger('peralatan_telemetri_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponens');
    }
};
