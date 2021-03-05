<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeanceSousGroupeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seance_sous_groupe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seance_id');
            $table->unsignedBigInteger('sous_groupe_id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seance_sous_groupe');
    }
}
