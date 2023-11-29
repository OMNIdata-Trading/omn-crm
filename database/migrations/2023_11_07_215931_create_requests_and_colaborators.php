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
        Schema::create('requests_and_colaborators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_request')
                  ->nullable()
                  ->constrained('client_requests')
                  ->cascadeOnDelete();
            $table->foreignId('id_colaborator')
                  ->nullable()
                  ->constrained('colaborators')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_requests_and_colaborators');
    }
};
