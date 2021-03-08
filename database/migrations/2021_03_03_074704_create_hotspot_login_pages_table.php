<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotspotLoginPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('smart_wifi')->create('hotspotLoginPages', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('serviceLocationId');
            $table->string('company');
            $table->string('title', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->char('fontColor')->nullable();
            $table->char('primaryColor')->nullable();
            $table->char('secondaryColor')->nullable();
            $table->string('font')->nullable();
            $table->char('opacity')->nullable();
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
        Schema::connection('smart_wifi')->dropIfExists('hotspotLoginPages');
    }
}
