<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('type');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->string('track');
            $table->string('speaker_name');
            $table->string('user_id')->nullable();

            $table->integer('number_of_reviews')->default(0);
            $table->integer('average_review_rating')->default(0);

            $table->timestamps();
        });
    }
}
