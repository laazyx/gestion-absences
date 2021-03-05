<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSousGroupeIdToEtudiants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->unsignedBigInteger('sous_groupe_id');
            $table->foreign('sous_groupe_id')->references('id')->on('sous_groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiant', function (Blueprint $table) {
            //
        });
    }
}
