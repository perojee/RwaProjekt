<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artiklis', function (Blueprint $table) {
            $table->id();
            $table->string('ime')->nullable();
            $table->string('opis')->nullable();
            $table->string('slika')->nullable();
            $table->string('kategorija')->nullable();
            $table->int('kolicina')->nullable();
            $table->int('cijena')->nullable();
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
        Schema::dropIfExists('artiklis');
    }
};
