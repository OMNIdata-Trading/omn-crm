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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('vendor')
                  ->nullable();
            $table->string('delivery_time')
                  ->nullable();
            $table->date('requested_at')
                  ->nullable();
            $table->date('responsed_at')
                  ->nullable();
            $table->foreignId('id_request')
                  ->nullable()
                  ->constrained('client_requests')
                  ->nullOnDelete();
            $table->foreignId('requested_by_colab_id')
                  ->nullable()
                  ->constrained('colaborators')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
