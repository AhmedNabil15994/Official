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

class SyncMessagesJob implements ShouldQueue
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
        $messagesArr = [];
        $mainData = $this->item;
        // $messages = $mainData['allMessages']['data'];
        $sessionId = $mainData['sessionId'];
        $find = Http::get(env('URL_WA_SERVER').'/messages/fetchMessages?lmts=all&id='.$sessionId);
        $find2 = Http::get(env('URL_WA_SERVER').'/messages/fetchDialogs?lmts=all&id='.$sessionId);
        // $dialogs = [];
        // $msgIDS = [];
        // $msgStatus = [];
        // foreach($messages as $message){
        //     // $dialogObj = Dialog::where('id',$message['key']['remoteJid'])->where('sessionId',$sessionId)->first();
        //     // if(!$dialogObj){
        //     //     $dialogObj = new Dialog;
        //     //     $dialogObj->id = $message['key']['remoteJid'];
        //     //     $dialogObj->sessionId = $sessionId;
        //     //     $dialogObj->save();
        //     // }

        //     if(isset($message['message']) && $message['message'] != null) {
        //         $fromMe = $message['message'] && $message['message']['fromMe'] == 'true' ? 1 : 0;
        //         $message['key']['remoteJid'] = str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid']);
        //         $msgData = $message['message'];
        //         $msgData = $this->formatMessage($msgData);

        //         if(in_array($msgData['messageType'], ['forwardMessage','replyMessage','extendedTextMessage','buttonsMessage','templateMessage','listMessage','reactionMessage','contactMessage','locationMessage','buttons_response','mentionMessage'])){
        //             $body = json_encode($msgData['body']);
        //         }else{
        //             $body = isset($msgData['body']) ? $msgData['body'] : null;
        //         }
                
        //         // $messageObj = Message::where('id','LIKE','%'.$msgData['id'])->where('sessionId',$sessionId)->first();
        //         // if(!$messageObj && $body != ''){
        //         //     $item = [
        //         //         'id' => $msgData['id'],
        //         //         'sessionId' => $sessionId,
        //         //         'body'=> $body,
        //         //         'messageType' => $msgData['messageType'],
        //         //         'fileName' => isset($msgData['fileName']) ? $msgData['fileName']: null,
        //         //         'caption' => $msgData['caption'],
        //         //         'fromMe' => $fromMe,
        //         //         'dialog_id' => str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid']),
        //         //         'author' => !$fromMe ? $msgData['pushName'] != null ? $msgData['pushName'] : (isset($message['chatName']) ? $message['chatName']:str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid'])) : 'Me' ,
        //         //         'chatName' => isset($msgData['chatName']) ? $msgData['chatName'] : null,
        //         //         'pushName' => $msgData['pushName'] != null ? $msgData['pushName'] : $message['pushName'],
        //         //         'time' => $msgData['time'],
        //         //         'timeFormatted' => $msgData['timeFormatted'],
        //         //         'status' => in_array($msgData['status'], [3,4]) ? $msgData['status'] : 2,
        //         //         'statusText' => in_array($msgData['status'], [3,4]) && $msgData['statusText'] != null ? $msgData['statusText'] : 'Sent',
        //         //         'deviceSentFrom' => $msgData['deviceSentFrom'],
        //         //     ];
        //         //     Message::create($item);
        //         // }else if($messageObj && $body != ''){
        //         //     if($messageObj->time == null && $msgData && $msgData['time']){
        //         //         $messageObj->time = $msgData['time'];
        //         //         $messageObj->timeFormatted = $msgData['timeFormatted'];
        //         //     }
        //         //     $messageObj->save();
        //         // }
        //         $item = [
        //             'id' => $msgData['id'],
        //             'sessionId' => $sessionId,
        //             'body'=> $body,
        //             'messageType' => $msgData['messageType'],
        //             'fileName' => isset($msgData['fileName']) ? $msgData['fileName']: null,
        //             'caption' => isset($msgData['caption']) ? $msgData['caption'] : null,
        //             'fromMe' => $fromMe,
        //             'dialog_id' => str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid']),
        //             'author' => !$fromMe ? isset($msgData['pushName']) && $msgData['pushName'] != null ? $msgData['pushName'] : (isset($message['chatName']) ? $message['chatName']:str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid'])) : 'Me' ,
        //             'chatName' => isset($msgData['chatName']) ? $msgData['chatName'] : null,
        //             'pushName' => isset($msgData['pushName']) && $msgData['pushName'] != null ? $msgData['pushName'] : ( isset($message['pushName']) && $message['pushName'] != null ? $message['pushName'] : (!$fromMe ? isset($msgData['pushName']) && $msgData['pushName'] != null ? $msgData['pushName'] : (isset($message['chatName']) ? $message['chatName']:str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid'])) : 'Me') ),
        //             'time' => $msgData['time'],
        //             'timeFormatted' => $msgData['timeFormatted'],
        //             'status' => in_array($msgData['status'], [3,4]) ? $msgData['status'] : 2,
        //             'statusText' => in_array($msgData['status'], [3,4]) && $msgData['statusText'] != null ? $msgData['statusText'] : 'Sent',
        //             'deviceSentFrom' => $msgData['deviceSentFrom'],
        //         ];
        //         $message['message'] = $item;
        //         $messagesArr[] = $message;
        //         $dialogs[]= $message['key']['remoteJid'];
        //         if($item['status'] > 2){
        //             $msgIDS[] = $msgData['id'];
        //             $msgStatus[$msgData['id']]=[
        //                 'status' => $item['status'],
        //                 'statusText' => $item['statusText'],
        //             ];
        //         }
        //     }
        // }

        // $fileName = $sessionId.'.json';
        // $path = storage_path().'/logs/pm2s/'.$fileName;
        // if(!file_exists($path)){
        //     // create file then insert data
        //     file_put_contents($path, json_encode([
        //         'messages' => $messagesArr,
        //     ]));
        // }else{
        //     // read file data then update it
        //     $fileData = file_get_contents($path);
        //     $data = json_decode($fileData);
        //     if($data){
        //         if(isset($data->messages)){
        //             $data->messages = array_merge($data->messages,$messagesArr);
        //         }else{
        //             $data->messages = $messagesArr;
        //         }
        //     }else{
        //         $data = [
        //             'messages' => $messagesArr,
        //         ];
        //     }
        //     file_put_contents($path, json_encode($data));
        // }

        // $fileNames = $sessionId.'-2.json';
        // $paths = storage_path().'/logs/pm2s/'.$fileNames;
        // $dialogs = array_unique($dialogs);
        // $dialogArr = [];
        // foreach ($dialogs as $key => $value) {
        //     $dialogArr[] = ['id'=>$value];
        // }
        // if(!file_exists($paths)){
        //     // create file then insert data
        //     file_put_contents($paths, json_encode([
        //         'chats' => $dialogArr,
        //     ]));
        // }else{
        //     // read file data then update it
        //     $fileData = file_get_contents($paths);
        //     $data = json_decode($fileData);
        //     if($data){
        //         if(isset($data->chats)){
        //             $data->chats = array_merge($data->chats,$dialogArr);
        //         }else{
        //             $data->chats = $dialogArr;
        //         }
        //     }else{
        //         $data = [
        //             'chats' => $dialogArr,
        //         ];
        //     }
        //     file_put_contents($paths, json_encode($data));
        // }


        // if(count($msgStatus) >= 1 && count($msgIDS) >= 1){
        //     $fileName = $sessionId.'.json';
        //     $path = storage_path().'/logs/pm2s/'.$fileName;
        //     if(file_exists($path)){
        //         $fileData = file_get_contents($path);
        //         $data = json_decode($fileData);
        //         if($data){
        //             if(isset($data->messages)){
        //                 $oldMessage = $data->messages;
        //                 $dataArr = [];
        //                 foreach ($oldMessage as $key => $value) {
        //                     if(in_array($value->key->id,$msgIDS)){
        //                         $statusArr = $msgStatus[$value->key->id];
        //                         if(isset($msgStatus[$value->key->id]) && !empty($msgStatus[$value->key->id]) && isset($value->message)){
        //                             $value->message->status = $statusArr['status'];
        //                             $value->message->statusText = $statusArr['statusText'];
        //                         }
        //                     }
        //                     $dataArr[] = $value;
        //                 }
        //                 file_put_contents($path, json_encode(['messages'=>$dataArr]));
        //             }
        //         }
        //     }
        // }   

        return 1;
    }

    public function formatMessage($msgData){
        if($msgData['messageType'] == 'buttonsMessage'){
            $myData = [];
            $items = $msgData['body']['buttons'];
            foreach($items as $oneKey => $oneItem){
                if(isset($oneItem['id'])){
                    $myData [] = [
                        'id' => $oneItem['id'],
                        'title' => isset($items[$oneKey+1]['title']) ? $items[$oneKey+1]['title'] : null,
                        'type' => isset($items[$oneKey+2]['type']) ? $items[$oneKey+2]['type'] : null,
                    ];
                }
            }     
            $msgData['body']['buttons'] = $myData;
        }else if($msgData['messageType'] == 'templateMessage'){
            $myData = [];
            $items = $msgData['body']['buttons'];
            $buttonType = [];
            foreach($items as $oneKey => $oneItem){
                if(isset($oneItem['index'])){
                    $index = $oneItem['index'];
                    $dataType = '';
                    if(isset($items[$oneKey+1]['urlButton']) && !empty($items[$oneKey+1]['urlButton'])){
                        $buttonType = [
                            'title' => isset($items[$oneKey+1]['urlButton']) && isset($items[$oneKey+1]['urlButton']['title']) ? $items[$oneKey+1]['urlButton']['title'] : '',
                            'url' => isset($items[$oneKey+2]['urlButton']) && isset($items[$oneKey+2]['urlButton']['url']) ? $items[$oneKey+2]['urlButton']['url'] : '',
                        ];
                        $dataType = 'urlButton';
                    }else if(isset($items[$oneKey+1]['callButton']) && !empty($items[$oneKey+1]['callButton'])){
                        $buttonType = [
                            'title' => isset($items[$oneKey+1]['callButton']) && isset($items[$oneKey+1]['callButton']['title']) ? $items[$oneKey+1]['callButton']['title'] : '',
                            'phone' => isset($items[$oneKey+2]['callButton']) && isset($items[$oneKey+2]['callButton']['phone']) ? $items[$oneKey+2]['callButton']['phone'] : '',
                        ];
                        $dataType = 'callButton';
                    }else if(isset($items[$oneKey+1]['normalButton']) && !empty($items[$oneKey+1]['normalButton'])){
                        $buttonType = [
                            'title' => isset($items[$oneKey+1]['normalButton']) && isset($items[$oneKey+1]['normalButton']['title']) ? $items[$oneKey+1]['normalButton']['title'] : '',
                            'id' => isset($items[$oneKey+2]['normalButton']) && isset($items[$oneKey+2]['normalButton']['id']) ? $items[$oneKey+2]['normalButton']['id'] : '',
                        ];
                        $dataType = 'normalButton';
                    }
                    $myData [] = [
                        'index' => $oneItem['index'],
                        $dataType => $buttonType
                    ];
                }
            }     
            $msgData['body']['buttons'] = $myData;
        }else if($msgData['messageType'] == 'listMessage'){
            $myData = [];
            $items = $msgData['body']['sections'];
            $rowsData = [];
            for($x =0;$x < count($items);$x++){
                if(array_keys($items[$x])[0] == 'title'){
                    $myData[$x] = [
                        'title' => $items[$x]['title'],
                        'rows' => [],
                    ];
                }else{
                    if(array_keys($items[$x]['rows'][0])[0] == 'id'){
                        $id = array_keys($items[$x]['rows'][0])[0] == 'id' ? $items[$x]['rows'][0]['id'] : '';
                        $title = @array_keys($items[$x+1]['rows'][0])[0] == 'title' ? $items[$x+1]['rows'][0]['title'] : '';
                        $description = @array_keys($items[$x+2]['rows'][0])[0] == 'description' ? $items[$x+2]['rows'][0]['description'] : '';
                        if($id != ''){
                            $rowsData [$x] = [
                                'id' => $id,
                                'title' => $title,
                                'description' => $description,
                            ];
                        }
                    }
                }
            }

            $newData = [];
            $myData = array_reverse($myData, true);
            $rowsData = array_reverse($rowsData, true);
            foreach($myData as $oneKey => $oneData){
                foreach ($rowsData as $key => $value) {
                    if($key > $oneKey ){
                        unset($rowsData[$key]);
                        $myData[$oneKey]['rows'][$key]= $value;
                    }
                }
            }
            $myData = array_reverse($myData, true);
            foreach($myData as $item){
                $newData[] = [
                    'title' => $item['title'],
                    'rows' => array_values(array_reverse($item['rows'], true))
                ];
            }

            $msgData['body']['sections'] = $newData;
        }
        return $msgData;
    }
}
