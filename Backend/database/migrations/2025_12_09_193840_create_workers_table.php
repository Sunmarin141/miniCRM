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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('login_code',16)->unique(true);
            $table->tinyText('first_name');
            $table->tinyText('second_name');
            $table->tinyText('third_name');
            $table->foreignId('position_id')->constrained()->nullbale()->onDelete('set null')->onUpdate('cascade');
            $table->tinyText('monthly_earnings');
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
