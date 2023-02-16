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
        Schema::create('voit_affectes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->OnUpdate('cascade')->OnDelete('cascade');
            $table->foreignId('commissariat_id')->OnUpdate('cascade')->OnDelete('cascade');
             $table->foreignId('vehicule_id')->OnUpdate('cascade')->OnDelete('cascade');
             $table->foreignId('statut_id')->OnUpdate('cascade')->OnDelete('cascade');
             $table->date('date_acqui')->default(now());

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
        Schema::dropIfExists('voit_affectes');
    }
};
