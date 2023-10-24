<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colaborators_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_colaborator')
                  ->nullable()
                  ->constrained('colaborators')
                  ->cascadeOnDelete();
            $table->foreignId('id_task')
                  ->nullable()
                  ->constrained('tasks')
                  ->cascadeOnDelete();
            $table->enum('status', ['to_do', 'done', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborators_tasks');
    }
};
