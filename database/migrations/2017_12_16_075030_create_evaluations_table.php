<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->text('clinical_diagnosis')->nullable();
            $table->string('responsible')->nullable();
            $table->date('evaluation_date')->nullable();
            $table->string('pa')->nullable();
            $table->string('fc')->nullable();

            $table->longText('qp')->nullable();
            $table->longText('hma')->nullable();
            $table->longText('hpp')->nullable();
            $table->string('associated_diseases')->nullable();
            $table->text('associated_diseases_specifications')->nullable();

            $table->text('alimentation')->nullable();
            $table->text('sleeping')->nullable();
            $table->text('sleeping_position')->nullable();
            $table->boolean('smoking')->nullable();
            $table->string('smoking_frequency')->nullable();
            $table->boolean('alcoholism')->nullable();
            $table->string('alcoholism_frequency')->nullable();

            $table->string('family_history')->nullable();
            $table->text('family_history_specifications')->nullable();

            $table->longText('previous_treatments')->nullable();
            $table->longText('complementary_exams')->nullable();
            $table->longText('physical_exam')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
