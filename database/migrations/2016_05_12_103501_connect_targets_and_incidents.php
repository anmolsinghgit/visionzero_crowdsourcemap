<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectTargetsAndIncidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidents', function (Blueprint $table) {

           //  # Add a new INT field called `target_id` that has to be unsigned (i.e. positive)
            $table->integer('target_id')->unsigned();

           //  # This field `target_id` is a foreign key that connects to the `id` field in the `targets` table
           $table->foreign('target_id')->references('id')->on('targets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidents', function (Blueprint $table) {

           //  # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            $table->dropForeign('incidents_target_id_foreign');
            //
            $table->dropColumn('target_id');
        });
    }
}
