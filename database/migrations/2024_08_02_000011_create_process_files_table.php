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
        Schema::create('process_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('created_date')->nullable();
            $table->string('created_by')->nullable();
            $table->string('reviewed_by');
            $table->string('appoved_by');
            $table->date('approval_date');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('process_id');
            $table->unsignedBigInteger('process_file_status_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_files');
    }
};
