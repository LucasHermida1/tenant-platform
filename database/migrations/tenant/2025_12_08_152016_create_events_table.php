<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('tenant')->create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->date('date');

            $table->decimal('price', 10, 2)->default(0);

            $table->unsignedBigInteger('academy_id')->nullable();

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
        Schema::connection('tenant')->dropIfExists('events');
    }
};
