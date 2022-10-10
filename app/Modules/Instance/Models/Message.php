<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    use \TraitsFunc;

    protected $table = 'messages';
    protected $connection = 'mysql';
    protected $fillable = ['id','sessionId','body','caption','messageType','fileName','dialog_id','fromMe','author','chatName','pushName','time','timeFormatted','status','statusText','deviceSentFrom','deleted_by','deleted_at'];    
    public $timestamps = false;
    protected $casts = ['id' => 'string'];


    static function dataList($sessionId = null) {
        $input = \Request::all();

        if(isset($input['deleteByMe']) && $input['deleteByMe'] == 1){
            $source = self::where('id','!=',null);
        }else{
            $source = self::NotDeleted();
        }
       
        if(isset($input['id']) && !empty($input['id'])){
            $source->where('id','LIKE','%'.$input['id'])->orderBy('time','DESC');
        }
        if(isset($input['chatId']) && !empty($input['chatId'])){
            $source->where('chatName',$input['chatId']);
        }
        if(isset($input['min_time']) && !empty($input['min_time'])){
            $source->where('time','>=',$input['min_time']);
        }
        if($sessionId != null){
            $source->where('sessionId',$sessionId);
        }

        if(isset($input['orderBy']) && !empty($input['orderBy']) && isset($input['sort']) && !empty($input['sort'])){
            $source->orderBy($input['orderBy'],$input['sort']);
        }else{
            $source->orderBy('time','DESC');
        }

        $limit = 100;
        if(isset($input['lmts']) && !empty($input['lmts'])){
            $limit = $input['lmts'];
        }
        return self::generateObj($source,$limit);
    }

    static function generateObj($source,$limit,$option=null){
        if($limit == 'all'){
            $sourceArr = $source->get();
        }else{
            $sourceArr = $source->paginate($limit);
        }
        
        $list = [];

        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value,$limit);
        }
        
        $data['data'] = $list;
        if($limit != 'all'){
            $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        }

        return $data;
    }


    static function getData($source,$limit=null){
        $dataObj = new \stdClass();

        if($limit){
            return self::formMessageForWloopWebhook($source);
        }

        $dataObj->id = $source->id;
        // $dataObj->sessionId = $source->sessionId;
        if(in_array($source->messageType, ['extendedTextMessage','buttonsMessage','templateMessage','listMessage','reactionMessage','contactMessage','locationMessage'])){
            $dataObj->body = json_decode($source->body);
        }else{
            $dataObj->body = $source->body;
        }
        $dataObj->caption = $source->caption;
        $dataObj->messageType = $source->messageType;
        $dataObj->fileName = $source->fileName != null ? $source->fileName : '';
        $dataObj->dialog_id = $source->dialog_id;
        $dataObj->fromMe = $source->fromMe;
        $dataObj->author = $source->author;
        $dataObj->chatName = $source->chatName;
        $dataObj->pushName = $source->pushName;
        $dataObj->time = $source->time;
        $dataObj->timeFormatted = $source->timeFormatted;
        $dataObj->status = $source->status;
        $dataObj->statusText = $source->statusText;
        $dataObj->deviceSentFrom = $source->deviceSentFrom;
        $dataObj->chatId = $source->chatName.'@c.us';
        $dataObj->type = self::getType($source->messageType);
        $dataObj->sending_status = lcfirst($dataObj->type);
        $dataObj->senderName = $source->author;
        $dataObj->metadata = [];
        if($source->deleted_by){
            $dataObj->deletedForMe = $source->deleted_by;
            $dataObj->deleted_at = $source->deleted_at;
        }
        return $dataObj;
    }  

    static function getType($type){
        $type = str_replace('Message','',$type);
        if($type == 'text'){
            return 'chat';
        }else{
            $type = str_replace('Message','',$type);
            if($type == 'audio'){
                return 'ptt';
            }else{
                return $type;
            }
        }
    }

    static function formMessageForWloopWebhook($source){
        $dataObj = new \stdClass();
        if(in_array($source->messageType, ['forwardMessage','replyMessage','extendedTextMessage','buttonsMessage','templateMessage','listMessage','reactionMessage','contactMessage','locationMessage','buttons_response','mentionMessage'])){
            $source->body = is_object($source->body) ? $source->body : json_decode($source->body);
        }else{
            $source->body = $source->body;
        }

        $dataObj->id = ($source->fromMe ? 'true_' : 'false_') . (isset($source->dialog_id) ? $source->dialog_id : $source->chatName.(str_contains($source->chatName, '@g.us') ? '' :'@c.us')) . '_' . $source->id;
        $dataObj->body = $source->body;
        $dataObj->chatId = isset($source->dialog_id) ? $source->dialog_id : $source->chatName.(str_contains($source->chatName, '@g.us') ? '' :'@c.us') ;
        $dataObj->fromMe = $source->fromMe;
        $dataObj->type = self::getType($source->messageType);
        $dataObj->senderName = $source->author;
        $dataObj->time = $source->time;
        $dataObj->caption = isset($source->caption) ? $source->caption : '';

        if(isset($source->status)){
            $dataObj->sending_status = $source->status > 1 ? $source->status - 1 : $source->status;
            $dataObj->sending_status_text = self::getSendingStatus($dataObj->sending_status);
        }
        
        $dataObj->metadata = null;
        $dataObj->author = is_numeric($source->author) ? $source->author.'@c.us' : $source->author;

        if($dataObj->type == 'buttons'){
            $replyButtons = [];
            foreach($source->body->buttons as $button){
                $replyButtons[]= [
                    'id' => $button->id,
                    'displayText' => $button->title,
                ];
            }
            $dataObj->body = isset($source->body->content) ? $source->body->content : $source->body->title;
            $dataObj->metadata = [
                'footer' => $source->body->footer,
                'replyButtons' => $replyButtons,
            ];
            $dataObj->type = 'chat';
            if($source->body->hasPreview == 1){
                $dataObj->body = $source->body->image;
                $dataObj->caption = $source->body->content . " \r\n \r\n " .$source->body->footer; 
                $dataObj->type = 'image';
            }else{
                $dataObj->metadata['title'] = $source->body->title; 
                $dataObj->body = isset($source->body->content) ? $source->body->content : $source->body->title;
            }
        }else if($dataObj->type == 'template'){
            $replyButtons = [];
            foreach($source->body->buttons as $button){
                if(@!empty($button->{array_keys((array)$button)[1]})){
                    $replyButtons[]= [
                        'id' => $button->index,
                        'displayText' => $button->{array_keys((array)$button)[1]}->title,
                    ];
                }
            }
            $dataObj->body = ($source->body->hasPreview == 1 ? $source->body->image : isset($source->body->content)) ? $source->body->content : $source->body->title;
            $dataObj->caption = $source->body->hasPreview == 1 ? $source->body->content : '';
            $dataObj->metadata = [
                'footer' => $source->body->footer,
                'replyButtons' => $replyButtons,
            ];
            $dataObj->type = $source->body->hasPreview == 1 ? 'image' : 'chat';
            if($source->body->hasPreview == 1){
                $dataObj->body = $source->body->image;
                $dataObj->caption = $source->body->content . " \r\n \r\n " .$source->body->footer; 
                $dataObj->type = 'image';
            }else{
                $dataObj->metadata['title'] = $source->body->title; 
                $dataObj->body = isset($source->body->content) ? $source->body->content : $source->body->title;
            }
        }else if($dataObj->type == 'forward'){
            $dataObj->isForwarded = 1;
            $dataObj->body = $source->body->text;
            $dataObj->metadata = $source->body;
        }else if($dataObj->type == 'disappearing'){
            $dataObj->type = 'chat';
            $dataObj->metadata = [
                'message_type' => 'disappearing',
                'expiration' => $source->expiration,
                'expirationFormatted' => $source->expirationFormatted,
            ];
        }else if($dataObj->type == 'video'){
            $dataObj->caption = isset($source->caption) ? $source->caption : '';
        }else if($dataObj->type == 'sticker'){
            $dataObj->type = 'image';
            $dataObj->metadata = [
                'message_type' => 'sticker',
            ];
        }else if($dataObj->type == 'gif'){
            $dataObj->type = 'video';
            $dataObj->metadata = [
                'message_type' => 'gif',
            ];
        }else if($dataObj->type == 'mention'){
            $dataObj->type = 'chat';
            $dataObj->body = $source->body->text;
            $dataObj->metadata = (object)[
                'message_type' => 'mention',
                'msg' => json_encode($source->body)
            ];
        }else if($dataObj->type == 'contact'){
            $dataObj->type = 'vcard';
            $dataObj->body = $source->body->name;
            $dataObj->metadata = [
                'message_type' => 'contact',
                'name' => $source->body->name,
                'organization' => is_array($source->body->organization) ? '' :$source->body->organization,
                'phone' => $source->body->phone,
            ];
        }else if($dataObj->type == 'location'){
            $dataObj->type = 'location';
            $dataObj->body = '';
            $dataObj->metadata = [
                'latitude' => $source->body->latitude,
                'longitude' => $source->body->longitude,
            ];
        }else if($dataObj->type == 'list'){
            $dataObj->type = 'list';
            $dataObj->body = '';
            $dataObj->metadata = $source->body;
        }else if($dataObj->type == 'buttons_response'){
            $dataObj->type = 'buttons_response';
            $dataObj->body = $source->body->selectedButtonText;
            $dataObj->metadata = [
                'selectedButtonId' => $source->body->selectedButtonID,
                'type' => $source->body->type,
                'quotedMsgId' => $source->body->quotedMsgId
            ];
            $dataObj->quotedMsgType = 'chat';
            $dataObj->quotedMsgId = 'true_'.str_replace('@s.whatsapp.net','@c.us',$source->body->quotedChatId).'_'.$source->body->quotedMsgId;
            $quotedMsgObj = null;//Message::where('id',$source->body->quotedMsgId)->first();
            if($quotedMsgObj){
                $dataObj->quotedMsgBody =  isset($quotedMsgObj->body) && json_decode($quotedMsgObj->body) && isset(json_decode($quotedMsgObj->body)->content) ? json_decode($quotedMsgObj->body)->content : $quotedMsgObj->body ;
                $dataObj->metadata = [
                    'selectedButtonId' => $source->body->selectedButtonID,
                    'type' => $source->body->type,
                    'quotedMsgBody' => json_decode($quotedMsgObj->body)
                ];
            }
            
        }else if($dataObj->type == 'reply'){
            $dataObj->type = 'chat';
            $dataObj->body = $source->body->text;
            $quotedMsgObj = null;//Message::where('id',$source->body->quotedMessage->id)->first();
            if($quotedMsgObj){
                $dataObj->quotedMsgBody =  isset($quotedMsgObj->body) && json_decode($quotedMsgObj->body) && isset(json_decode($quotedMsgObj->body)->content) ? json_decode($quotedMsgObj->body)->content : $quotedMsgObj->body ;
                $dataObj->metadata = [
                    'type' => 'chat',
                    'quotedMsgBody' => json_decode($quotedMsgObj->body)
                ];
            }
        }   
        if(isset($dataObj->fileName) && $dataObj->fileName != "" && $dataObj->fileName != null){
            $dataObj->fileName = $dataObj->fileName;
        }
        $dataObj->chatName = $source->chatName;
        $dataObj->pushName = $source->pushName;
        $dataObj->timeFormatted = $source->timeFormatted;
        $dataObj->deviceSentFrom = $source->deviceSentFrom;
        unset($dataObj->dialog_id);
        unset($dataObj->messageType);

        //fileName
        //chatName
        //pushName
        //timeFormatted
        //sending_status_text
        //deviceSentFrom
        return $dataObj;
    }

    static function getSendingStatus($status){
        if($status == 0){
            return 'Not Sent';
        }else if($status == 1){
            return 'Sent';
        }else if($status == 2){
            return 'Delivered';
        }else if($status == 3){
            return 'Viewed';
        }
    }
}
