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
        Schema::create('client_colaborator_requesters', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')
                  ->unique()
                  ->nullable();
            $table->string('phone_number1')
                  ->nullable();
            $table->string('phone_number2')
                  ->nullable();
            $table->string('phone_number3')
                  ->nullable();
            $table->foreignId('id_client_company')
                  ->nullable()
                  ->constrained('client_companies')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_colaborator_requesters');
    }
};
