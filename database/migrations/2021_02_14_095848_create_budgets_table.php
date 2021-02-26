<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('pr_utility')->default(0);
            $table->integer('pr_comparable_rent')->default(0);
            $table->integer('pr_moving_expense')->default(0);
            $table->integer('tr_offsite')->default(0);
            $table->integer('tr_utility')->default(0);
            $table->integer('tr_comparable_rent')->default(0);
            $table->integer('tr_off_moving_expense')->default(0);
            $table->integer('tr_on_moving_expense')->default(0);
            $table->integer('pr_consultancy')->default(0);
            $table->integer('tr_consultancy_off')->default(0);
            $table->integer('tr_consultancy_on')->default(0);
            $table->unsignedInteger('project_id');
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
        Schema::dropIfExists('budgets');
    }
}
