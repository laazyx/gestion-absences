<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupeIdToSousGroupes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sous_groupes', function (Blueprint $table) {
            $table->unsignedBigInteger('groupe_id');
            $table->foreign('groupe_id')->references('id')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sous_groupes', function (Blueprint $table) {
            //
        });
    }
}
