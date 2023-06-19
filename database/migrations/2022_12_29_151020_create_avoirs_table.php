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
        Schema::create('avoirs', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->foreignId('commissariat_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->foreignId('armement_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
      // $table->foreignId('statut_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->integer('quantite');
            $table->date('date_acqui');
            $table->timestamps();
        });
       // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avoirs');
    }
};
