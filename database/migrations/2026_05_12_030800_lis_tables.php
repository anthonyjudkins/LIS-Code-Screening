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
        Schema::create('legislators', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('hometown');
            $table->timestamps();
        });

        Schema::create('legislations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('legislation_legislator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('legislation_id')->constrained('legislations')->onDelete('cascade');
            $table->foreignId('legislator_id')->constrained('legislators')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['legislation_id', 'legislator_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legislation_legislator');
        Schema::dropIfExists('legislations');
        Schema::dropIfExists('legislators');
    }
};
