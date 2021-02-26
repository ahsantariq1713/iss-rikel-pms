<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('moving_company');
            $table->string('consultant');
            $table->string('management_company');
            $table->string('schedules_name');
            $table->timestamp('start_date');
            $table->string('status')->default('Processing');
            $table->text('commencement');
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('property_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
