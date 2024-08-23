<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->default(Str::uuid());
            $table->uuid('view_id')->default(Str::uuid());
            $table->unsignedBigInteger('couple_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('tag');
            $table->integer('template');
            $table->string('address');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
