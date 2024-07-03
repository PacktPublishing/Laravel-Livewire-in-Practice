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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->integer('mileage')->default(0);
            $table->enum('transmission', ['Manual', 'Auto'])->default('Auto');
            $table->decimal('daily_hire_cost', 10, 2)->default(0.00);
            $table->text('features')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('available')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->boolean('is_approved')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
