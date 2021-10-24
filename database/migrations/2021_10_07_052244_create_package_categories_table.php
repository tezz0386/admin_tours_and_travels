<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('name')->unique();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('title_tag')->unique();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('package_categories');
    }
}
