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
        Schema::table('pemeriksaans', function (Blueprint $table) {
            $table
                ->foreign('pemeliharaan_id')
                ->references('id')
                ->on('pemeliharaans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('komponen_id')
                ->references('id')
                ->on('komponens')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('setting_id')
                ->references('id')
                ->on('settings')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaans', function (Blueprint $table) {
            $table->dropForeign(['pemeliharaan_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['komponen_id']);
            $table->dropForeign(['setting_id']);
        });
    }
};
