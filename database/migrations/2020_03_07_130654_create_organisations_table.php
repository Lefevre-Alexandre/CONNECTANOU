<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('siret', 14);
            $table->string('raison_social');
            $table->string('logo')->nullable();
            $table->string('activite');
            $table->string('telephone');
            $table->string('nombre_salaries');
            $table->string('site')->nullable();
            $table->string('adresse');

            $table->unsignedBigInteger('type_organisation_id');
            $table->unsignedBigInteger('porteur_id');

            $table->foreign('type_organisation_id')
                  ->references('id')->on('type_organisations');


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
        Schema::table('organisations', function (Blueprint $table) {
          $table->dropForeign(['type_organisation_id']);
        });
        Schema::dropIfExists('organisations');
    }
}
