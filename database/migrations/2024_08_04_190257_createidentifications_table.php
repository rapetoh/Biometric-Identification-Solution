<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Identifications', function (Blueprint $table) {
            $table->id('idIDENT');
            $table->string('nom');
            $table->string('prenom');
            $table->string('NIU', 30);
            $table->string('sexe');
            $table->string('telephone', 15);
            $table->string('domicile');
            $table->string('lieu_identification');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Identifications');
    }
};
