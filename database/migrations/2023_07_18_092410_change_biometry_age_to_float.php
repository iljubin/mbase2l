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
        ini_set('memory_limit', '-1');

		\DB::unprepared(file_get_contents(dirname(__FILE__) . '/sql/change_biometry_age_to_float.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('float', function (Blueprint $table) {
            //
        });
    }
};
