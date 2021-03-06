<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnippetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('snippet_slug')->nullable(true)->unique(true);
            $table->longText('desc');
            $table->longText('snippet_content');
            $table->boolean('public');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('coding_language_id');
            $table->foreign('coding_language_id')
                ->references('id')->on('coding_languages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sammlung_id');
            $table->foreign('sammlung_id')
                ->references('id')->on('sammlungs')
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
        Schema::dropIfExists('snippets');
    }
}
