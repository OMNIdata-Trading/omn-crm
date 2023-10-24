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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['technic', 'comercial', 'technic_and_comercial']);
            $table->string('order_number');
            $table->string('proposal_code')
                  ->unique();
            $table->string('description')
                  ->nullable();
            $table->year('year');
            $table->enum('kind', ['supply', 'service_provision', 'supply_and_service_provision']);
            $table->enum('status', ['opened', 'negotiation', 'accepted', 'lost']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
