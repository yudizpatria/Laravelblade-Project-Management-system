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
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->date('start_date');
            $table->date('deadline');
            $table->string('location');
            $table->enum('status', ['not started', 'in progress', 'cancelled', 'finished'])->default('not started');
            $table->float('project_cost', 20, 2)->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('project_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
