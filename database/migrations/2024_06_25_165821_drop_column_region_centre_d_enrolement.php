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
        Schema::table('centre_enrolement', function (Blueprint $table) {
            $table->dropColumn('region');
            $table->integer('idRegion');
            $table->foreign('idRegion')->references('idRegion')->on('Region')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centre_enrolement', function (Blueprint $table) {
            $table->string('region', 100);
        });
    }
};
