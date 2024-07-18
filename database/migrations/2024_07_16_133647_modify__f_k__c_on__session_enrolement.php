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
        Schema::table('session_enrolements', function (Blueprint $table) {
            $table->dropForeign(['idAgent']);
            // Ajouter une nouvelle contrainte de clé étrangère sans ON DELETE CASCADE
            $table->foreign('idAgent')->references('idAgent')->on('agents')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    public function down()
    {
        Schema::table('session_enrolements', function (Blueprint $table) {
            //
        });
    }
};
