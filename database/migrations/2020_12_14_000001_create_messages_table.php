<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->string('id');
            $table->string('sessionId');
            $table->text('body');
            $table->text('caption')->nullable();
            $table->string('messageType')->nullable();
            $table->text('fileName')->nullable();
            $table->string('dialog_id')->nullable();
            $table->integer('fromMe')->nullable();
            $table->string('author')->nullable();
            $table->string('chatName')->nullable();
            $table->string('pushName')->nullable();
            $table->bigInteger('time')->nullable();
            $table->string('timeFormatted')->nullable();
            $table->integer('status')->nullable();
            $table->string('statusText')->nullable();
            $table->string('deviceSentFrom')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
