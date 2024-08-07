<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('area_process', function (Blueprint $table) {
            $table
                ->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('process_id')
                ->references('id')
                ->on('processes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('area_process', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
            $table->dropForeign(['process_id']);
        });
    }
};
