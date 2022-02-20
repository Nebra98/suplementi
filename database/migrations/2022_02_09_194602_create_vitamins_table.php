<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitaminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitamins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('generalDescription');
            $table->text('found');
            $table->text('antiAgingRole');
            $table->text('deficiencySymptoms');
            $table->text('therapeuticDoses');
            $table->text('maximumSafeLevel');
            $table->text('sideEffects');
            $table->text('contraindications');
            $table->text('interactions');
            $table->text('highRiskGroups');
            $table->text('compositionFormulas');
            $table->text('otherRemarks');
            $table->text('lang');
            $table->text('slug');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vitamins');
    }
}
