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
        Schema::create('komputer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained('area')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_komputer');
            $table->string('jenis');
            $table->string('ip_address');
            $table->string('user_login');
            $table->string('password');
            $table->string('prosesor');
            $table->string('ram');
            $table->string('mobo')->nullable();
            $table->string('os');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komputers');
    }
};
