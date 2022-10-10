<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\OfflineMessage;
use Http;
class OfflineMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $messages;
    public function __construct($messages)
    {
        $this->messages = $messages;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $offlineMessages = $this->messages;
        foreach ($offlineMessages as $key => $one) {
            $response = Http::post(env('URL_WA_SERVER').'/messages/sendOFFMessage?id='.$one->sessionId, ['message' => $one->message]);
            $res = json_decode($response->getBody());
            if($res && isset($res->success) && $res->success == true){
                $one->is_sent = 1;
                $one->status = 'SENT';
                $one->updated_at = date('Y-m-d H:i:s');
                $one->save();
            }
        }
        return 1;
    }
}
