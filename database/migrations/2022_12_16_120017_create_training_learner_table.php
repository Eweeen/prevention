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
        Schema::create('training_learner', function (Blueprint $table) {
            $table->unsignedBigInteger('learner_id');
            $table->unsignedBigInteger('training_id');

            $table->primary(['learner_id', 'training_id']);

            $table->foreign('learner_id')->references('id')->on('learners')->name('learner_id_training_learner')->onDelete('cascade');
            $table->foreign('training_id')->references('id')->on('trainings')->name('tranier_id_training_learner')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_learner');
    }
};
