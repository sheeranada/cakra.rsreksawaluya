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
        Schema::create('router', function (Blueprint $table) {
            $table->id();
            $table->string('nama_router');
            $table->string('ip_address');
            $table->string('user_login');
            $table->string('password');
            $table->string('ssid_default');
            $table->string('ssid_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routers');
    }
};
