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
            $table->string('libelle');
            $table->string('stock');
            $table->foreignId('commissariats_id')->constrained()->OnUpdate('cascade')->OnDelete('Cascade');
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
