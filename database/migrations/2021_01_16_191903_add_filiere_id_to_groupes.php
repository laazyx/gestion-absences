<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiliereIdToGroupes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groupes', function (Blueprint $table) {
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')->references('id')->on('filieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupes', function (Blueprint $table) {
            //
        });
    }
}
