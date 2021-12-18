<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CiblageCampagne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciblage_campagne', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_ciblage')->unsigned();
            $table->foreign('id_ciblage')
                  ->references('id')
                  ->on('ciblage')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_campagne')->unsigned();
            $table->foreign('id_campagne')
                  ->references('id')
                  ->on('campagne')
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
        Schema::dropIfExists('ciblage_campagne');
    }
}
