<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by');
            $table->string('name');
            $table->string('address')->nullable();
            $table->bigInteger('contact_no')->unique();
            $table->string('email')->unique()->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->string('designation');
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->integer('review')->default(0);
            $table->string('slug');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('members');
    }
}
