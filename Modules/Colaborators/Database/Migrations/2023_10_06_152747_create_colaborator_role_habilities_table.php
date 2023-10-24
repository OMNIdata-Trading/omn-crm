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
        Schema::create('colaborator_role_habilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('can_see_business');
            $table->boolean('can_create_business');
            $table->boolean('can_edit_business');
            $table->boolean('can_delete_business');

            $table->boolean('can_see_leads');
            $table->boolean('can_create_leads');
            $table->boolean('can_edit_leads');
            $table->boolean('can_delete_leads');

            $table->boolean('can_see_users');
            $table->boolean('can_create_users');
            $table->boolean('can_edit_users');
            $table->boolean('can_delete_users');
            
            $table->boolean('can_see_colaborators');
            $table->boolean('can_create_colaborators');
            $table->boolean('can_edit_colaborators');
            $table->boolean('can_delete_colaborators');
            
            $table->boolean('can_see_files');
            $table->boolean('can_create_files');
            $table->boolean('can_edit_files');
            $table->boolean('can_delete_files');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborator_role_habilities');
    }
};
