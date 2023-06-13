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
        Schema::create('armements', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('n_serie');
            // $table->string('revision');
            // $table->string('statut');
            $table->integer('stock');
            $table->foreignId('lieu_stock_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
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
        Schema::dropIfExists('armements');
    }
};
