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
        //
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('photo_header');
            $table->integer('price');
            $table->integer('mileage');
            $table->integer('description');
            // 0 for available, 1 for sold
            $table->boolean('status')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('sold_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('inventory');
    }
};
