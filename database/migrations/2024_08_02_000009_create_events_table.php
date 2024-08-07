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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date');
            $table->string('hour')->nullable();
            $table->string('place')->nullable();
            $table->text('description')->nullable();
            $table->string('created_by')->nullable();
            $table->json('participants')->nullable();
            $table->boolean('all_day')->default(0);
            $table
                ->enum('repeat', [
                    'Evento de una sola vez',
                    'Diariamente',
                    'Semanalmente (mismo dia próxima semana)',
                    'Mensualmente (misma fecha)',
                    'Anualmente ',
                ])
                ->default('Evento de una sola vez');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
