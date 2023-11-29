<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('topup_nominals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id');
            $table->string('nama_nominal');
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topup_nominals');
    }
};
