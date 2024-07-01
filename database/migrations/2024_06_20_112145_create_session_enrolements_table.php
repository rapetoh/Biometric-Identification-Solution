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
        Schema::create('session_enrolements', function (Blueprint $table) {
            $table->id('idSE')->change();
            $table->boolean('est_validee');
            $table->string('ref_enrolement',30)->unique();
            $table->integer('NIU')->unsigned();
            $table->integer('idAgent')->unsigned();
            $table->integer('idDDemo')->unsigned();
            $table->integer('idDBio')->unsigned();
            $table->foreign('NIU')->references('NIU')->on('individus')->onDelete('cascade');
            $table->foreign('idAgent')->references('idAgent')->on('agents')->onDelete('cascade');
            $table->foreign('idDDemo')->references('idDDemo')->on('donnees_demographiques')->onDelete('cascade');
            $table->foreign('idDBio')->references('idDBio')->on('donnees_biometriques')->onDelete('cascade');
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
        Schema::dropIfExists('session_enrolements');
    }
};
