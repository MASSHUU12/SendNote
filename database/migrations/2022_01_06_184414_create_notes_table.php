<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('expiration_date');
            $table->string('content');
            $table->string('link');
            $table->boolean('with_password');
            $table->string('password');
            $table->boolean('with_notification');
            $table->string('notification_email');
            $table->boolean('notification_send');
            $table->string('notification_reference');
            $table->boolean('with_views');
            $table->integer('views_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
