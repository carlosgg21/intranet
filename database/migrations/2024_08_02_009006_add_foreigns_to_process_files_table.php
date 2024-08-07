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
        Schema::table('process_files', function (Blueprint $table) {
            $table
                ->foreign('process_id')
                ->references('id')
                ->on('processes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('process_file_status_id')
                ->references('id')
                ->on('process_file_statuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('process_files', function (Blueprint $table) {
            $table->dropForeign(['process_id']);
            $table->dropForeign(['process_file_status_id']);
        });
    }
};
