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
        Schema::create('delivery_note_files', function (Blueprint $table) {
            $table->id();
            // $table->string('file_name');
            // $table->string('file_path');
            // $table->enum('file_type', ['pdf', 'eml', 'excel', 'doc', 'jpg', 'png']);
            // $table->foreignId('id_colaborator')
            //       ->nullable()
            //       ->constrained('colaborators')
            //       ->cascadeOnDelete();
            // $table->foreignId('id_delivery_note')
            //       ->nullable()
            //       ->constrained('delivery_notes')
            //       ->cascadeOnDelete();
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
        Schema::dropIfExists('delivery_note_files');
    }
};
