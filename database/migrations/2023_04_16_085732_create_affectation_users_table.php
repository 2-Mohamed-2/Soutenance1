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
        Schema::disableForeignKeyConstraints();
        Schema::create('affectation_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->foreignId('commissariat_id')->constrained()->OnUpdate('cascade')->OnDelete('cascade');
            $table->text('motif');
            $table->boolean('isAccepted')->default(false);
            $table->boolean('isRefused')->default(false);
            $table->boolean('isExpected')->default(true);
            $table->date('delaiExpiration')->nullable();
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
        Schema::dropIfExists('affectation_users');
    }
};
