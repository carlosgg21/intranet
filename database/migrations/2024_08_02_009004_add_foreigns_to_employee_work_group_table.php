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
        Schema::table('employee_work_group', function (Blueprint $table) {
            $table
                ->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('work_group_id')
                ->references('id')
                ->on('work_groups')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_work_group', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['work_group_id']);
        });
    }
};
