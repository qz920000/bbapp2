<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('univid');
             $table->string('vc_name');
             $table->string('chancellor_name');
             $table->string('registrar_name');
             $table->string('accreditation_status');
             $table->string('undergraduate_programs');
             $table->string('postgraduate_programs');
             $table->string('dress_code');
             $table->string('school_setting');
             $table->string('scholarship_availability');
             $table->string('library');
             $table->string('accomodation');
             $table->string('multi_single_campus');
             $table->string('gender_admission');
             $table->string('admission_selection');
             $table->string('admissions_rate');
             $table->string('admission_criteria');
             $table->string('admission_body');
             $table->string('jamb_cut_off');
             $table->string('student_size');
             $table->string('application_deadline');
             $table->string('male_students_size');
             $table->string('female_students_size');
             $table->string('instate_tuition');
             $table->string('outof_state_tuition');
             $table->string('application_fee');
             $table->string('accomodation_cost');
             $table->string('other_fees');
             $table->string('financial_aid');
             $table->string('motto');
             $table->string('Colours');
             $table->string('population_range');
             $table->string('distance_learning');
             $table->string('study_abroad');
             $table->string('exchange_programs');
             $table->string('online_classes');
             $table->string('accreditation');
             $table->string('affiliations');
             $table->string('admission_office');
             $table->string('faculty_size');
             $table->string('student_organizations');
             $table->string('athletics_body');
             $table->string('sports_facilities');
             $table->string('facebook');
             $table->string('twitter');
             $table->string('linkedin');
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
        Schema::drop('school_profiles');
    }
}
