<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Message;
use App\Models\Dialog;
use Http;

class SyncDialogsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $item;
    public function __construct($item)
    {
        // ini_set('memory_limit', '-1');
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $chats = [];
        $messages = [];
        $mainData = $this->item;
        $sessionId = $mainData['sessionId'];

        $find = Http::get(env('URL_WA_SERVER').'/messages/fetchDialogs?lmts=all&id='.$sessionId);
        $find = $find->json();
        
        if(isset($find['data']) && count($find['data']) > 1){
            $chats = $find['data'];
        }   

        $find2 = Http::get(env('URL_WA_SERVER').'/messages/fetchMessages?lmts=all&id='.$sessionId);
        $find2 = $find2->json();

        if(isset($find2['data']) && count($find2['data']) > 1){
            foreach($find2['data'] as $message){
                if(isset($message['key']) && isset($message['key']['remoteJid']) && $message['key']['remoteJid'] != 'status@broadcast' ){
                    $messages[$message['key']['remoteJid']][] = $message;
                }
            }
        }   

        $excludeFiles = ['chats.json','bots.json'];

        $path = storage_path().'/logs/pm2s/'.$sessionId.'/';
        $files = array_values(array_filter(scandir($path), function($file) use ($path,$excludeFiles) { 
            if(!in_array($file,$excludeFiles)){
                return !is_dir($path . '/' . $file);
            }
        }));

        if(count($files) > 2){
            $excludeFiles[] = $files[count($files) - 2];
            $excludeFiles[] = $files[count($files) - 1];

            foreach ($files as $key => $value) {
                if(!in_array($value, $excludeFiles)){
                    unlink($path.$value);
                }
            }

            file_put_contents($path.'bots.json', json_encode([
                'messages' => [],
            ]));

            file_put_contents($path.date('Y-m-d H').'.json', json_encode([
                'chats' => $chats,
                'messages' => $messages,
                'contacts' => [],
            ]));
        }
        
        
        return 1;
    }
}
