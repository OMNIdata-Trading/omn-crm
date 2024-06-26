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
        Schema::create('client_requests', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->string('description')
                  ->nullable();
            $table->string('request_code')
                  ->unique();
            $table->boolean('treated')
                  ->default(0);
            $table->foreignId('id_income_method')
                  ->nullable()
                  ->constrained('request_income_methods')
                  ->nullOnDelete();
            $table->foreignId('id_individual_client')
                  ->nullable()
                  ->constrained('individual_clients')
                  ->nullOnDelete();
            $table->date('requested_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_requests');
    }
};
