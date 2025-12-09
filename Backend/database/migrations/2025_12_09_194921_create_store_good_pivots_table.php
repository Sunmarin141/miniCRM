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
        Schema::create('store_good_pivots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('store_id')->constrained()->onUpdate('cascade');
            $table->foreignId('good_id')->constrained()->onUpdate('cascade');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_good_pivots');
    }
};
