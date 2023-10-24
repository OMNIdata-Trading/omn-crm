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
        Schema::create('classification_habilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_colaborator_classification')
                  ->nullable()
                  ->constrained('colaborator_role_classifications')
                  ->cascadeOnDelete();
            $table->foreignId('id_colaborator_hability')
                  ->nullable()
                  ->constrained('colaborator_role_habilities')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_classification_and_role_habilities');
    }
};
