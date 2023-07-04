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
        Schema::create('inconnus', function (Blueprint $table) {
            $table->id();
            $table->string('nomcomplet');
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->string('lieu_naiss');
            $table->date('date_naiss');
            $table->string('adresse');
            $table->string('telephone')->unique();
            $table->string('genre');
            $table->string('n_ci')->unique();
            $table->string('password');
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
        Schema::dropIfExists('inconnus');
    }
};
