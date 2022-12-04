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

        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('commissariat_id')->constrained()
            //         ->onUpdate('cascade')->onDelete('cascade')->nullable();

            // $table->foreignId('grade_id')->constrained()
            //         ->onUpdate('cascade')->onDelete('cascade')->nullable();


            $table->string('name');
            $table->string('matricule')->unique()->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->date('datearrive')->nullable();
            $table->string('photo')->nullable();
            $table->string('genre')->nullable();
            $table->date('datedepart')->nullable();
            $table->boolean('isActive')->default(false); //Pour recuperer la premiere connexion
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};


