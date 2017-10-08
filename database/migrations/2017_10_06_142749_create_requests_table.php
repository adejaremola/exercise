<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names');
            $table->string('email');
            $table->string('passport_no');
            $table->enum('request_type', ['PTA', 'BTA']);
            $table->integer('amount');
            $table->string('currency');
            $table->string('travel_date');
            $table->string('ticket_upload');
            $table->string('passport_upload');
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
        Schema::dropIfExists('requests');
    }
}
