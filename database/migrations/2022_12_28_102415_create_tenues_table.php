<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenues', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('modele');
            $table->string('taille');
            // $table->year('annee');
            // $table->string('statut');
            $table->string('stock');
            // $table->foreignId('commissariats_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            // $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenues');
    }
};
