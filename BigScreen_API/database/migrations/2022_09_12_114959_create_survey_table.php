<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            // $table->string('email', 50)->nullable(false);
            // $table->string('age')->nullable(false);
            // $table->string('gender')->nullable(false);
            // $table->string('nbPersonFamily')->nullable(false);
            // $table->string('job')->nullable(false);
            // $table->string('vrBrand')->nullable(false);
            // $table->string('storeBuyVr')->nullable(false);
            // $table->string('helmetBuyInFuture')->nullable(false);
            // $table->string('nbPeopleInFamilyUseVrForBigScreen')->nullable(false);
            // $table->string('mainlyUseBigscrrenFor')->nullable(false);
            // $table->string('pointsForImageQuality')->nullable(false);
            // $table->string('pointForComfortInterface')->nullable(false);
            // $table->string('pointForQuality3Dgraphics')->nullable(false);
            // $table->string('pointForAudioQuality')->nullable(false);
            // $table->string('preciseNotifications')->nullable(false);
            // $table->string('inviteFriendJoin')->nullable(false);
            // $table->string('recordTVshows')->nullable(false);
            // $table->string('playExclusiveGames')->nullable(false);
            // $table->string('newFeature')->nullable(false);
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
        Schema::dropIfExists('survey');
    }
};
