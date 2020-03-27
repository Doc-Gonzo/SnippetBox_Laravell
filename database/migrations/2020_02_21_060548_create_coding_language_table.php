<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodingLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coding_languages', function (Blueprint $table) {
        $table->bigIncrements('id');

        $table->string('name');
        $table->unsignedBigInteger('context_id');

        $table->foreign('context_id')
            ->references('id')->on('context')
            ->onDelete('cascade');

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
        Schema::dropIfExists('coding_languages');
    }
}
