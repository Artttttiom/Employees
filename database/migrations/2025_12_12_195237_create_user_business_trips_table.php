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
        Schema::create('user_business_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->сonstrained(table: 'assets')->cascadeOnDelete();
            $table->foreignId('user_id')->сonstrained(table: 'users')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_business_trips');
    }
};
