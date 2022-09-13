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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('responseOne',50)->nullable(false)->unique();
            $table->text('responseTwo')->nullable(false);
            $table->text('responseThree')->nullable(false);
            $table->text('responseFour')->nullable(false);
            $table->text('responseFive')->nullable(false);
            $table->text('responseSix')->nullable(false);
            $table->text('responseSeven')->nullable(false);
            $table->text('responseEight')->nullable(false);
            $table->text('responseNine')->nullable(false);
            $table->text('responseTen')->nullable(false);
            $table->text('responseEleven')->nullable(false);
            $table->text('responseTwelve')->nullable(false);
            $table->text('responseThirteen')->nullable(false);
            $table->text('responseFourteen')->nullable(false);
            $table->text('responseFifteen')->nullable(false);
            $table->text('responseSixteen')->nullable(false);
            $table->text('responseSeventeen')->nullable(false);
            $table->text('responseEighteen')->nullable(false);
            $table->text('responseNineteen')->nullable(false);
            $table->text('responseTwenty')->nullable(false);
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
        Schema::dropIfExists('surveys');
    }
};
