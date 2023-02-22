<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{

    /**
     * Creates Table to store Patients data
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patientNationality', 2);
            $table->string('patientNric');
            $table->string('patientName');
            $table->string('patientGender');
            $table->date('patientBirthDate');
            $table->string('patientEmail');
            $table->string('sampleUniqueId');
            $table->string('sampleResults');
            $table->dateTime('collectedDateTime');
            $table->dateTime('effectiveDateTime');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

