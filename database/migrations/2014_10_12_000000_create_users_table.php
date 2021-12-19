<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe')->hidden();
            $table->rememberToken();
            $table->string('telephone');
            $table->integer('id_roles')->unsigned();
            $table->foreign('id_roles')
                  ->references('id')
                  ->on('roles')
                  ->onCascade('delete');
            $table->integer('id_agence')->unsigned();
            $table->foreign('id_agence')
                  ->references('id')
                  ->on('agence')
                  ->onCascade('delete');
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
}
