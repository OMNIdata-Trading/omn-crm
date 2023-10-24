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
            $table->double('total_cost');
            $table->string('lead_time');
            $table->date('sent_to_client_at');
            $table->enum('currency', ['ao', 'eu']);
            $table->date('expiration_date');
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
