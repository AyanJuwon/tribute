<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMemorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('memorials', function (Blueprint $table) {
            $table->string('birth_state')->after('music')->nullable();
            $table->string('birth_country')->after('music')->nullable();
            $table->string('death_country')->after('music')->nullable();
            $table->string('death_state')->after('music')->nullable();
            $table->string('personal_phrase')->after('music')->nullable();
            $table->string('main_section_text')->after('music')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memorials', function (Blueprint $table) {
            //
        });
    }
}
