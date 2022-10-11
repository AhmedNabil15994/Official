<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflineMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_messages', function (Blueprint $table) {
            $table->id();
            $table->string('sessionId');
            $table->string('chatId');
            $table->integer('sent_time');
            $table->text('message');
            $table->string('type')->nullable();
            $table->string('status')->default('PENDING');
            $table->integer('is_sent')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offline_messages');
    }
}
