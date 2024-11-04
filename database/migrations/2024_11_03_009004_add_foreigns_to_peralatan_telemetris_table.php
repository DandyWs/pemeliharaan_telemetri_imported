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
        Schema::table('peralatan_telemetris', function (Blueprint $table) {
            $table
                ->foreign('jenis_peralatan_id')
                ->references('id')
                ->on('jenis_peralatans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peralatan_telemetris', function (Blueprint $table) {
            $table->dropForeign(['jenis_peralatan_id']);
        });
    }
};
