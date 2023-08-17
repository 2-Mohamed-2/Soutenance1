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
        Schema::create('carte_biometriques', function (Blueprint $table) {
            $table->id();
            $table->string('nomCB');
            $table->string('prenomCB');
            $table->date('dateNaissCB');
            $table->string('lieuNaissCB');
            $table->string('domicileCB');
            $table->date('dateDelivCB');
            $table->date('dateExpirCB');
            $table->string('telephoneCB');
            $table->string('professionCB');
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
        Schema::dropIfExists('carte_biometriques');
    }
};
