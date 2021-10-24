<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('created_by');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('start_from')->nullable();
            $table->longText('description')->nullable();
            $table->longText('summary')->nullable();
            $table->string('title_tag')->unique();
            $table->text('meta_keywords');
            $table->longText('meta_description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('destinations');
    }
}
