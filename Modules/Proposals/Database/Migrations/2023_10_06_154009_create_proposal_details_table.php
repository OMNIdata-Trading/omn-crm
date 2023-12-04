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
        Schema::create('proposal_details', function (Blueprint $table) {
            $table->id();
            $table->double('total_cost')
                  ->nullable();
            $table->string('lead_time')
                  ->nullable();
            $table->date('sent_to_client_at')
                  ->nullable();
            $table->enum('currency', ['ao', 'eu']);
            $table->string('expiration_time')
                  ->nullable();
            // $table->string('payment_method')
            //       ->nullable();
            $table->foreignId('id_proposal')
                  ->nullable()
                  ->constrained('proposals')
                  ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_details');
    }
};
