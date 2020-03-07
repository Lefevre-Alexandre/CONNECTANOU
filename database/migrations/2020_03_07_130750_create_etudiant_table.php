<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('date_naissance')->nullable();
            $table->string('url_cv')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('photo');
            $table->string('description')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('code_postal_id');

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
        Schema::table('etudiants', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropForeign(['code_postal_id']);
        });
        Schema::dropIfExists('etudiants');
    }
}
