<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('grid_id')->references('id')->on('grids')->name('grid_id_courses');
            $table->foreign('training_id')->references('id')->on('trainings')->name('training_id_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
//            $table->dropForeign('courses_grid_id_foreign');
//            $table->dropForeign('courses_training_id_foreign');
        });
    }
};
