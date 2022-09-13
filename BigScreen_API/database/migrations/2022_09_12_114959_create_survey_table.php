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
            $table->string('responseOne')->nullable(false)->unique();
            $table->string('responseTwo')->nullable(false);
            $table->string('responseThree')->nullable(false);
            $table->string('responseFour')->nullable(false);
            $table->string('responseFive')->nullable(false);
            $table->string('responseSix')->nullable(false);
            $table->string('responseSeven')->nullable(false);
            $table->string('responseEight')->nullable(false);
            $table->string('responseNine')->nullable(false);
            $table->string('responseTen')->nullable(false);
            $table->string('responseEleven')->nullable(false);
            $table->string('responseTwelve')->nullable(false);
            $table->string('responseThirteen')->nullable(false);
            $table->string('responseFourteen')->nullable(false);
            $table->string('responseFifteen')->nullable(false);
            $table->string('responseSixteen')->nullable(false);
            $table->string('responseSeventeen')->nullable(false);
            $table->string('responseEighteen')->nullable(false);
            $table->string('responseNineteen')->nullable(false);
            $table->string('responseTwenty')->nullable(false);
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
