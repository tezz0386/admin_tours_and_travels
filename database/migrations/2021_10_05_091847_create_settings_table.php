<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('close_day');
            $table->string('open_time');
            $table->string('close_time');
            $table->bigInteger('contact_no')->unique();
            $table->bigInteger('toll_free')->unique();
            $table->string('logo');
            $table->string('icon');
            $table->longText('location')->nullable();
            $table->string('title_tag');
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->integer('updated_by');
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
        Schema::dropIfExists('settings');
    }
}
