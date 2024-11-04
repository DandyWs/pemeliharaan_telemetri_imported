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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaSetting');
            $table->integer('nilaiSebelumKalibrasi');
            $table->integer('displaySebelumKalibrasi');
            $table->integer('nilaiSetelahKalibrasi');
            $table->integer('displaySetelahKalibrasi');
            $table->unsignedBigInteger('peralatan_telemetri_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
