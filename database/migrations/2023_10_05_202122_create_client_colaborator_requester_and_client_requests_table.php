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
        Schema::create('requester_and_client_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client_requester')
                  ->nullable()
                  ->constrained('client_colaborator_requesters')
                  ->cascadeOnDelete();
            $table->foreignId('id_requests')
                  ->nullable()
                  ->constrained('client_requests')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_colaborator_requester_and_client_requests');
    }
};
