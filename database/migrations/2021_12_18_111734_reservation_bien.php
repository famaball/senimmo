<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationBien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_bien', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_bien')->unsigned();
            $table->foreign('id_bien')
                  ->references('id')
                  ->on('bien')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_reservation')->unsigned();
            $table->foreign('id_reservation')
                  ->references('id')
                  ->on('reservation')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamp('date_reservation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_bien');
    }
}
