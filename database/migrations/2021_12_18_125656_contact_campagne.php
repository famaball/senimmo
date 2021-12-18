<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactCampagne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_campagne', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_type_contact')->unsigned();
            $table->foreign('id_type_contact')
                  ->references('id')
                  ->on('type_contact')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_campagne')->unsigned();
            $table->foreign('id_campagne')
                  ->references('id')
                  ->on('campagne')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_contact')->unsigned();
            $table->foreign('id_contact')
                  ->references('id')
                  ->on('contact')
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
        Schema::dropIfExists('contact_campagne');
    }
}
