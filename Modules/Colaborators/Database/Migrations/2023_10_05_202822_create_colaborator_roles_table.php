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
        Schema::create('colaborator_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_role_classification')
                  ->nullable()
                  ->constrained('colaborator_role_classifications')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborator_roles');
    }
};
