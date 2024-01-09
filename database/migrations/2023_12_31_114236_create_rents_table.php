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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string("type")->nullable();
            $table->string("description")->nullable();
            $table->string("location")->nullable();
            $table->string("price_type")->nullable();
            $table->decimal("price")->nullable();
            $table->string("rent_id")->nullable();
            $table->string("taken_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
