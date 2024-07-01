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
        Schema::create('session_pre_enrolements', function (Blueprint $table) {
            $table->id('idSPE')->change();
            $table->string('nom_individu');
            $table->string('prenom_individu');
            $table->string('telephone_individu', 15);
            $table->string('mail_individu');
            $table->string('ref_enrolement',30)->unique();
            $table->integer('NIU')->unsigned();
            $table->integer('idDDemo')->unsigned();
            $table->foreign('NIU')->references('NIU')->on('individus')->onDelete('cascade');
            $table->foreign('idDDemo')->references('idDDemo')->on('donnees_demographiques')->onDelete('cascade');
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
        Schema::dropIfExists('session_pre_enrolements');
    }
};
