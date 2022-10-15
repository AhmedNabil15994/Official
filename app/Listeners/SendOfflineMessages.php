<?php

namespace App\Listeners;

use App\Events\QRScanned;
use App\Jobs\OfflineMessageJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\OfflineMessage;


class SendOfflineMessages implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /**
     * Handle the event.
     *
     * @param  \App\Events\QRScanned  $event
     * @return void
     */
    public function handle(QRScanned $event)
    {
        $sessionId = $event->device->name;
        sleep(60);
        $chunks = 50;
        $queuedMessages = OfflineMessage::where('sessionId',$sessionId)->where('is_sent',0)->chunk($chunks,function($data){
            try {
                dispatch(new OfflineMessageJob(reset($data)))->onConnection('database');
            } catch (Exception $e) {}
        });
        return 1;
    }
}
