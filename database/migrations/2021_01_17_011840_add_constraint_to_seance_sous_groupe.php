<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintToSeanceSousGroupe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seance_sous_groupe', function (Blueprint $table) {
            $table->foreign('seance_id')->references('id')->on('seances');
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
        Schema::table('seance_sous_groupe', function (Blueprint $table) {
            //
        });
    }
}
