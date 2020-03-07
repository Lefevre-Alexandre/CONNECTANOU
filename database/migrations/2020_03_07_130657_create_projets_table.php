<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('titre');
            $table->string('description');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('piece_jointe');
            $table->integer('budget');
            $table->string('date_mise_en_ligne');
            $table->integer('vu')->default(0);

            $table->boolean('brouillon')->default(0);
            $table->boolean('valide')->default(1);
            $table->boolean('publier')->default(0);
            $table->boolean('negociation')->default(0);
            $table->boolean('encours')->default(0);
            $table->boolean('recette')->default(0);
            $table->boolean('cloturer')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_projet_id');

            $table->foreign('user_id')
                  ->references('id')->on('users');

            $table->foreign('type_projet_id')
                  ->references('id')->on('type_projets');

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

        Schema::table('projets', function (Blueprint $table) {
          $table->dropForeign(['type_projet_id']);
          $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('projets');
    }
}
