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
        Schema::create('munitions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            // $table->string('libelle');
            $table->integer('quantite');
             $table->foreignId('lieu_stock_id')->constrained()->OnUpdate('Cascade')->OnDelete('Cascade');
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
        Schema::dropIfExists('munitions');
    }
};
