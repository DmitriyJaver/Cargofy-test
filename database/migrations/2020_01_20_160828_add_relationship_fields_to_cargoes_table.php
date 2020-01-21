<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCargoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cargoes', function (Blueprint $table) {
            $table->unsignedBigInteger('from_city_id')->nullable();
            $table->foreign('from_city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('to_city_id')->nullable();
            $table->foreign('to_city_id')->references('id')->on('cities');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargoes', function (Blueprint $table) {
            //
        });
    }
}
