<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('tenant')->create('academies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('address')->nullable();

            $table->unsignedBigInteger('instructor_id')->nullable();

            $table->timestamps();

            $table
                ->foreign('instructor_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::connection('tenant')->dropIfExists('academies');
    }
};
