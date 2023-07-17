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
        Schema::create('muni_affs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commissariat_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->foreignId('munition_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->date('date_acqui');
            // $table->integer('quantite');
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
        Schema::dropIfExists('muni_affs');
    }
};
