<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('smart_wifi')->create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loginPageId');
            $table->tinyInteger('loginTypeId');
            $table->char('userId', 36)->nullable();
            $table->json('attributes')->nullable();
            $table->json('log');
            $table->dateTime('date');
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
        Schema::connection('smart_wifi')->dropIfExists('guests');
    }
}
