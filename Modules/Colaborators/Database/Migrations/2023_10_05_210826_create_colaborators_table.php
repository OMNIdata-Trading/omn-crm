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
        Schema::create('colaborators', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')
                  ->unique();
            $table->string('phone_number1')
                  ->nullable();
            $table->string('phone_number2')
                  ->nullable();
            $table->foreignId('id_colaborator_role')
                  ->nullable()
                  ->constrained('colaborator_roles')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborators');
    }
};
