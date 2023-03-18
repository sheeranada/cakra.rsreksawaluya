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
        Schema::create('pma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('server')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('user_login');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmas');
    }
};
