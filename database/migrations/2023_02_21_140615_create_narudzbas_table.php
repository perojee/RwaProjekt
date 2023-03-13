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
        Schema::create('narudzbas', function (Blueprint $table) {
            $table->id();
            $table->string('ime')->nullable();
            $table->string('email')->nullable();
            $table->string('broj')->nullable();
            $table->string('adresa')->nullable();
            $table->string('user_id')->nullable();

            $table->string('naziv_artikla')->nullable();
            $table->string('kolicina')->nullable();
            $table->string('cijena')->nullable();
            $table->string('slika')->nullable();
            $table->string('artikal_id')->nullable();

            $table->string('dostava_status')->nullable();
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
        Schema::dropIfExists('narudzbas');
    }
};
