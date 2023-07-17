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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('commissariat_id')->constrained()
            // ->onUpdate('cascade')->onDelete('cascade')->nullable();

            // $table->foreignId('user_id')->constrained()
            // ->onUpdate('cascade')->onDelete('cascade')->nullable();

            // $table->string('identifiant')->unique();
            $table->string('type');
            $table->string('modele');
            // $table->string('plaque');
            $table->integer('quantite');
            // $table->string('revision');
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
        Schema::dropIfExists('vehicules');
    }
};
