<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_clients', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')
                  ->unique();
            $table->string('logo_path')
                  ->nullable();
            $table->string('nif')
                  ->unique()
                  ->nullable();
            $table->string('website')
                  ->nullable();
            $table->string('email')
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_clients');
    }
};
