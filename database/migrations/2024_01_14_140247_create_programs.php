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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->integer('secteur_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::table('programs', function (Blueprint $table) {

            $table->integer('sondages_total')->default(0);
            $table->integer('likes_total')->default(0);

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
