<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotspotLoginFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('smart_wifi')->create('hotspotLoginForms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loginPageId');
            $table->boolean('google')->default(false);
            $table->boolean('facebook')->default(false);
            $table->boolean('twitter')->default(false);
            $table->boolean('github')->default(false);
            $table->json('forms')->nullable();
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
        Schema::connection('smart_wifi')->dropIfExists('hotspotLoginForms');
    }
}
