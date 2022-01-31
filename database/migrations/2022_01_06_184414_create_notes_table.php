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
            $table->text('title');
            $table->date('expiration_date');
            $table->text('content');
            $table->string('link');
            $table->string('password');
            $table->string('notification_email')->nullable();
            $table->string('notification_reference')->nullable();
            $table->boolean('views_limit')->nullable();
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
