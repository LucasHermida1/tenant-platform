<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('tenant')->create('tenant_settings', function (Blueprint $table) {
            $table->id();

            // Identidad del tenant
            $table->string('brand_name')->nullable();
            $table->string('slogan')->nullable();

            // Branding visual
            $table->string('logo_path')->nullable();
            $table->string('primary_color')->default('#1e40af');
            $table->string('secondary_color')->default('#0f172a');
            $table->string('accent_color')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('tenant')->dropIfExists('tenant_settings');
    }
};
