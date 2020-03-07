<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('titre');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('specialisation');

            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('domaine_id');
            $table->unsignedBigInteger('ecole_id');
            $table->unsignedBigInteger('diplome_id');

            $table->foreign('etudiant_id')
                  ->references('id')->on('etudiants');
            $table->foreign('domaine_id')
                  ->references('id')->on('domaines');
            $table->foreign('ecole_id')
                  ->references('id')->on('ecoles');
            $table->foreign('diplome_id')
                  ->references('id')->on('diplomes');

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
        Schema::table('formations', function (Blueprint $table) {
          $table->dropForeign(['domaine_id']);
          $table->dropForeign(['etudiant_id']);
          $table->dropForeign(['ecole_id']);
          $table->dropForeign(['diplome_id']);
        });

        Schema::dropIfExists('formations');
    }
}
