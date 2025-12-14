<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            /**
             * Identidad básica del tenant
             */
            $table->string('name');                  // Nombre visible: AIT, ITF España, etc.
            $table->string('slug')->unique();        // Identificador interno: ait, es, br
            $table->string('domain')->unique()->nullable(); // Dominio o subdominio (futuro)

            /**
             * Infraestructura
             */
            $table->string('database')->unique();    // Base física: tenant_ait, tenant_es

            /**
             * Branding básico (uso GLOBAL, antes de resolver tenant DB)
             * 👉 pensado para selector de federaciones, login, landing, etc.
             */
            $table->string('logo_path')->nullable();       // Logo principal
            $table->string('primary_color')->nullable();   // Color principal (branding)
            $table->string('secondary_color')->nullable(); // Color secundario (branding)

            /**
             * Estado del tenant
             */
            $table->boolean('active')->default(true); // Permite desactivar tenants sin borrarlos

            $table->timestamps();

            /**
             * Índices semánticos (más allá del unique)
             */
            $table->index('slug');
            $table->index('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
