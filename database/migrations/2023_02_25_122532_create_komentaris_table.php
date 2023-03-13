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
        Schema::create('komentaris', function (Blueprint $table) {
            $table->id();
            $table->string('ime')->nullable();
            $table->longtext('komentar')->nullable();
            $table->string('user_id')->nullable();
            $table->unsignedBigInteger('artikal_id');
            $table->foreign('artikal_id')->references('id')->on('artiklis')->onDelete('cascade');
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
        Schema::dropIfExists('komentaris');
    }
};
