<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable();
            $table->integer('destination_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->bigInteger('contact_no');
            $table->integer('adults')->default(0);
            $table->integer('childs')->default(0);
            $table->date('arrival')->nullable();
            $table->date('departure')->nullable();
            $table->bigInteger('charge');
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_read')->default(false);
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
        Schema::dropIfExists('bookings');
    }
}
