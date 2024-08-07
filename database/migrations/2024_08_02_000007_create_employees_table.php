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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('identification')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->unsignedBigInteger('charge_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('email')->nullable();
            $table->date('hiring_date')->nullable();
            $table->date('discharge_date')->nullable();
            $table->date('birthday')->nullable();
            $table->text('observation')->nullable();
            $table->string('code')->nullable();
            $table->string('image')->nullable();

            $table->index('identification');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
