<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDialogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogs', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('sessionId');
            $table->text('name')->nullable();
            $table->bigInteger('last_time')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('pinned')->nullable();
            $table->integer('archived')->nullable();
            $table->integer('unreadCount')->nullable();
            $table->integer('readOnly')->nullable();
            $table->bigInteger('ephemeralExpiration')->nullable();
            $table->integer('notSpam')->nullable();
            $table->integer('unreadMentionCount')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->unique(['id', 'sessionId']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialogs');
    }
}
