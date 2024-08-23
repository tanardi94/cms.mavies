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

        Schema::table('couples', function (Blueprint $table) {
            $table->foreign('user_id')->on('users')->references('id');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('couple_id')->on('couples')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
        });

        Schema::table('participants', function (Blueprint $table) {
            $table->foreign('category_id')->on('categories')->references('id');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('event_id')->on('events')->references('id');
            $table->foreign('participant_id')->on('participants')->references('id');
        });

        Schema::table('moments', function (Blueprint $table) {
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('event_id')->on('events')->references('id');

        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->foreign('event_id')->on('events')->references('id');
            $table->foreign('user_id')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['couple_id']);
        });

        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['event_id', 'participant_id']);
        });

        Schema::table('moments', function (Blueprint $table) {
            $table->dropForeign(['couple_id']);

        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->dropForeign(['event_id', 'user_id']);

        });
    }
};
