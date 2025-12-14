<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('tenant')->create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable();

            $table->unsignedBigInteger('academy_id')->nullable();

            $table->string('belt')->nullable(); // cinturón actual

            $table->timestamps();

            $table
                ->foreign('academy_id')
                ->references('id')
                ->on('academies')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::connection('tenant')->dropIfExists('students');
    }
};
