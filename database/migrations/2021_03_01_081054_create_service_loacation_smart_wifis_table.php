<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceLoacationSmartWifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('smart_wifi')->create('serviceLocationSmartWifis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routerId');
            $table->foreignUuid('serviceLocationId');
            $table->string('url', 200);
            $table->string('username');
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('customer')->dropIfExists('serviceLocationSmartWifis');
    }
}
