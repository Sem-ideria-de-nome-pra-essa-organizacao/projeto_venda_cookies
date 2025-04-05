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
        Schema::create('biscuits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('flavor');
            $table->string('size');
            $table->string('shape');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('baker_id');
            $table->string('description')->nullable();
            $table->foreign('baker_id')->references('id')->on('bakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biscuits');
    }
};
