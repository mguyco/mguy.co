<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_scopes', function (Blueprint $table) {
            $table->integer('scope_id')->unsigned()->
                references('id')->
                on('scopes')->
                onUpdate('cascade')->
                onDelete('cascade');

            $table->integer('user_id')->unsigned()->
                references('id')->
                on('users')->
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
        Schema::dropIfExists('user_scopes');
    }
}
