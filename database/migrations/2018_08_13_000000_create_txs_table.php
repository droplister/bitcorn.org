<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('txs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tx_index')->unique();
            $table->unsignedInteger('block_index')->index();
            $table->string('tx_hash')->unique();
            $table->string('status')->index();
            $table->string('source')->index();
            $table->string('destination')->nullable()->index();
            $table->string('asset')->index();
            $table->unsignedBigInteger('quantity');
            $table->string('memo')->nullable();
            $table->string('memo_hex')->nullable();
            $table->string('confirmed_at')->nullable();
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
        Schema::dropIfExists('txs');
    }
}
