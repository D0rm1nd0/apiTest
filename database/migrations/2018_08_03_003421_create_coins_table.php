<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('website_slug')->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->float('circulating_supply')->nullable();
            $table->float('total_supply')->nullable();
            $table->float('max_supply')->nullable();
            $table->string('last_updated')->nullable();
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
        Schema::dropIfExists('coins');
    }
}
