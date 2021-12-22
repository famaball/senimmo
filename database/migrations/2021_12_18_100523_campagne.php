<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Campagne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagne', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('sujet');
            $table->string('contenu');
            $table->string('nom_emetteur');
            $table->string('email_emetteur')->unique();
            $table->string('send_to_all');
            $table->timestamps();

            $table->integer('id_type_campagne')->unsigned();
            $table->foreign('id_type_campagne')
                  ->references('id')
                  ->on('type_campagne')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_statut_campagne')->unsigned();
            $table->foreign('id_statut_campagne')
                  ->references('id')
                  ->on('statut_campagne')
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
        Schema::dropIfExists('campagne');
    }
}
