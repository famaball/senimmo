<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bien', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('adresse');
            $table->string('prix');
            $table->string('type');
            $table->string('surface');
            $table->string('description');
            $table->string('image');
            $table->timestamps();

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                  ->references('id')
                  ->on('user')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_agence')->unsigned();
            $table->foreign('id_agence')
                  ->references('id')
                  ->on('agence')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_typebien')->unsigned();
            $table->foreign('id_typebien')
                  ->references('id')
                  ->on('typebien')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_statut_bien')->unsigned();
            $table->foreign('id_statut_bien')
                  ->references('id')
                  ->on('statut_bien')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_etat_bien')->unsigned();
            $table->foreign('id_etat_bien')
                  ->references('id')
                  ->on('etat_bien')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_localite')->unsigned();
            $table->foreign('id_localite')
                  ->references('id')
                  ->on('localite')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bien');
    }
}
