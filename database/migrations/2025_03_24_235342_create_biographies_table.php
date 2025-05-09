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
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membre_id');
            $table->text('description');
            $table->timestamps();
            
            $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biographies');
    }
};
