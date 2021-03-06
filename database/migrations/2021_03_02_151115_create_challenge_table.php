<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge', function (Blueprint $table) {
            $table->increments("id");
            $table->string('title',50);
            $table->string('description',1000)->nullable()->default('NULL');
            $table->string('filePath',200)->nullable();
            $table->datetime('modified_time')->nullable();
            $table->datetime('deadline');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge');
    }
}
