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
        Schema::create('donnees_biometriques', function (Blueprint $table) {
            $table->id('idDBio')->change();
            $table->binary('empreinte_pouce');
            $table->binary('empreinte_index');
            $table->binary('empreinte_majeur');
            $table->binary('empreinte_annulaire');
            $table->binary('empreinte_auriculaire');
            $table->binary('photo');
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
        Schema::dropIfExists('donnees_biometriques');
    }
};
