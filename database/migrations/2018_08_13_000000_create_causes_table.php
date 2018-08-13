<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('asset_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tx_id')->nullable();
            $table->string('title');
            $table->string('subtitle');
            $table->text('content');
            $table->string('image_url');
            $table->string('address');
            $table->string('memo')->unique();
            $table->unsignedBigInteger('target');
            $table->unsignedBigInteger('pledged');
            $table->unsignedBigInteger('released');
            $table->timestamp('ended_at');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('released_at')->nullable();
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
        Schema::dropIfExists('causes');
    }
}
