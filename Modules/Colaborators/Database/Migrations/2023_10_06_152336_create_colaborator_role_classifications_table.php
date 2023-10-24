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
        Schema::create('colaborator_role_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_colaborator_role')
                  ->nullable()
                  ->constrained('colaborator_roles')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborator_role_classifications');
    }
};
