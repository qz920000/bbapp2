<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('fax');
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('founded');
            $table->string('shortname');
            $table->string('longname');
            $table->string('altname');
            $table->string('ownership_type');
            $table->string('religious_affiliation');    
             $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('owner_name');
            $table->string('entered_by');     
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
        Schema::drop('schools');
    }
}
