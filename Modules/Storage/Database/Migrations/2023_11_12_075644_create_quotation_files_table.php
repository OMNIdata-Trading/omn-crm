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
        Schema::create('quotation_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_path')
                  ->nullable();
            $table->string('file_type')
                  ->nullable();
            $table->foreignId('id_colaborator')
                  ->nullable()
                  ->constrained('colaborators')
                  ->cascadeOnDelete();
            $table->foreignId('id_quotation')
                  ->nullable()
                  ->constrained('quotations')
                  ->cascadeOnDelete();
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
        Schema::dropIfExists('quotation_files');
    }
};
