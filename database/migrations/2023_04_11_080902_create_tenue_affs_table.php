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
        Schema::create('tenue_affs', function (Blueprint $table) {
            $table->id();
      // $table->foreignId('user_id')->OnUpdate('cascade')->OnDelete('cascade');
         $table->foreignId('commissariat_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
         $table->foreignId('tenue_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
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
        Schema::dropIfExists('tenue_affs');
    }
};
