<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('diploma');
            $table->string('bachelors');
            $table->string('masters');
            $table->string('doctorate');
            $table->string('other_degree');
            $table->string('country');
            $table->string('contact');
            $table->string('department_head');
            $table->integer('school_id');
            $table->integer('faculty_id');
            $table->integer('status');
            $table->string('shortname');
            $table->string('altname');
            $table->string('slug');
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
        Schema::drop('courses');
    }
}
