<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_vendors', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->
                references('id')->
                on('projects')->
                onUpdate('cascade')->
                onDelete('cascade');

            $table->integer('vendor_id')->unsigned()->
                references('id')->
                on('vendors')->
                onUpdate('cascade')->
                onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_vendors');
    }
}
