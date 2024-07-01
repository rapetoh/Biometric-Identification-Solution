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
        Schema::create('donnees_demographiques', function (Blueprint $table) {
            $table->id('idDDemo')->change();
            $table->string('nom');
            $table->string('nom_de_jeune_fille');
            $table->string('prenom');
            $table->char('sexe', 1);
            $table->string('statut_matrimonial', 50);
            $table->string('nom_prenom_conjoint');
            $table->date('DOB');
            $table->string('pays_ville_naissance');
            $table->string('pays_ville_residence');
            $table->string('quartier_residence');
            $table->string('profession');
            $table->string('secteur_emploi');
            $table->string('mail',30)->unique();
            $table->string('tel1', 15);
            $table->string('tel2', 15);
            $table->string('groupe_sanguin', 3);
            $table->text('pieces_justificatives');
            $table->string('nom_personne_a_prevenir1');
            $table->string('nom_personne_a_prevenir2');
            $table->string('numero_personne_a_prevenir1', 15);
            $table->string('numero_personne_a_prevenir2', 15);
            $table->string('ref_enrolement',30)->unique();
            $table->integer('idAgent')->unsigned();
            $table->integer('NIU')->unsigned();
            $table->foreign('idAgent')->references('idAgent')->on('agents')->onDelete('cascade');
            $table->foreign('NIU')->references('NIU')->on('individus')->onDelete('cascade');
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
        Schema::dropIfExists('donnees_demographiques');
    }
};
