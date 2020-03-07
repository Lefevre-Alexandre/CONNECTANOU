<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description');
            $table->string('obtention')->nullable();

            $table->unsignedBigInteger('niveau_diplome_id');

            $table->foreign('niveau_diplome_id')
                  ->references('id')->on('niveau_diplomes')
                  ->onDelete('cascade');


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
        Schema::table('diplomes', function (Blueprint $table) {
          $table->dropForeign(['niveau_diplome_id']);
        });

        Schema::dropIfExists('diplomes');
    }
}
