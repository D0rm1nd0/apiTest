<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->float('volume_24h');
            $table->float('market_cap');
            $table->float('percent_change_1h');
            $table->float('percent_change_24h');
            $table->float('percent_change_7d');
            $table->integer('coin_id')->unsigned()->nullable();
            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');
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
        Schema::dropIfExists('quotes');
    }
}
