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
        Schema::create('peralatan_telemetris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaAlat');
            $table->string('serialNumber');
            $table->string('lokasiStasiun');
            $table->unsignedBigInteger('jenis_peralatan_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peralatan_telemetris');
    }
};
