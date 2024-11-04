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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('hasilPemeriksaan');
            $table->string('catatan');
            $table->unsignedBigInteger('pemeliharaan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('komponen_id')->nullable();
            $table->unsignedBigInteger('setting_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
