<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porteurs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nom');
            $table->string('prenom');
            $table->string('poste')->nullable();
            $table->string('telephone');

            $table->unsignedBigInteger('organisation_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('code_postal_id');

            $table->foreign('organisation_id')
                  ->references('id')->on('organisations');
            $table->foreign('user_id')
                  ->references('id')->on('users');
            $table->foreign('code_postal_id')
                  ->references('id')->on('code_postals');

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
        Schema::table('porteurs', function (Blueprint $table) {
          $table->dropForeign(['organisation_id']);
          $table->dropForeign(['user_id']);
          $table->dropForeign(['code_postal_id']);
        });
        Schema::dropIfExists('porteurs');
    }
}
