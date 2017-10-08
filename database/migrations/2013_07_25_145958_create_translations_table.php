<?php

use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MP_translator_translations', function ($table) {
            $table->increments('id');
            $table->string('locale', 6);
            $table->string('namespace', 150)->default('*');
            $table->string('group', 150);
            $table->string('item', 150);
            $table->text('text');
            $table->boolean('unstable')->default(false);
            $table->boolean('locked')->default(false);
            $table->timestamps();
            $table->foreign('locale')->references('locale')->on('MP_translator_languages');
            $table->unique(['locale', 'namespace', 'group', 'item']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('language_entries');
    }

}
