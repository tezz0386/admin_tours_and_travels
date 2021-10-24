<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->integer('package_category_id');
            $table->integer('duration_days');
            $table->integer('duration_nights');
            $table->bigInteger('start_from');
            $table->string('difficulty')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('trip_overview')->nullable();
            $table->longText('itinearary')->nullable();
            $table->longText('pricing_plan')->nullable();
            $table->longText('booking')->nullable();
            $table->string('thumbnail');
            $table->string('title_tag')->unique();
            $table->text('meta_keywords')->nullable();;
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
        Schema::dropIfExists('packages');
    }
}
