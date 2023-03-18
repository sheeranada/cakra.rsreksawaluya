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
        Schema::create('wifi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('router_id')->constrained('router')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('area_id')->constrained('area')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ip_address');
            $table->string('dhcp');
            $table->string('ssid');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wifis');
    }
};
