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

            $table->foreignId('commissariat_id')->nullable()->constrained()
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('grade_id')->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('section_id')->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->integer('matricule')->unique();
            $table->string('pseudo')->unique();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->date('datenaiss')->nullable();
            $table->string('genre')->nullable();
            $table->date('datedepart')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isConnected')->default(false); //Pour recuperer la premiere connexion
            $table->boolean('isActive')->default(true); //Pour activer ou desactiver un compte
            $table->string('created_by')->nullable(); //Pour retrouver la personne qui a crée le user
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
