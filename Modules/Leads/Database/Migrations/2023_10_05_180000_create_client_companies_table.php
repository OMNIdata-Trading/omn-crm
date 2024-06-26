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
        Schema::create('client_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                  ->unique();
            $table->string('logo_path')
                  ->nullable();
            $table->string('nif')
                  ->unique()
                  ->nullable();
            $table->string('website')
                  ->nullable();
            $table->string('company_email')
                  ->nullable();
            $table->string('activity_area')
                  ->nullable();
            $table->year('first_purchase_year')
                  ->nullable();
            $table->year('first_request_year')
                  ->nullable();
            $table->enum('status', ['lead', 'client']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_companies');
    }
};
