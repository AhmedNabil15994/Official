<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_setting', function (Blueprint $table) {
            $table->id();
            $table->string('sessionId');
            $table->integer('sendDelay')->nullable();
            $table->text('webhooks')->nullable();
            $table->integer('statusNotificationsOn')->nullable();
            $table->integer('filesUploadOn')->nullable();
            $table->integer('ignoreOldMessages')->nullable();
            $table->integer('disableGroupsArchive')->nullable();
            $table->integer('disableDialogsArchive')->nullable();
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
        Schema::dropIfExists('device_setting');
    }
}
