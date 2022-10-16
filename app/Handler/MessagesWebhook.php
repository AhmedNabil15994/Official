<?php
namespace App\Handler;
use \Spatie\WebhookClient\ProcessWebhookJob;
use \Spatie\WebhookServer\WebhookCall;
use Http;
use Session;
use Throwable;
use App\Models\Message;
use App\Models\Dialog;
use App\Models\DeviceSetting;

class MessagesWebhook extends ProcessWebhookJob{
	public function handle(){
	    $data = json_decode($this->webhookCall, true);
	    $mainData = $data['payload'];

	    if(isset($mainData['conversation']) && isset($mainData['conversation']['lastMessage']) && $mainData['conversation']['lastMessage']){
	    	return $this->incomingMessage($mainData);
	    }

	    if(isset($mainData['messageStatus'])){
	    	return $this->updateMessage($mainData);
	    }

	    if(isset($mainData['conversationStatus'])){
	    	return $this->updateConversation($mainData);
	    }

	    if(isset($mainData['chatDeleted'])){
	     	return $this->deleteDialog($mainData);
	    }

	    if(isset($mainData['connectionStatus'])){
	    	return $this->updateConnectionStatus($mainData);
	    }

   		return 1;	   		
	}

	public function incomingMessage($mainData){
		$convData = $mainData['conversation'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData = (array) json_decode($mainData['conversation']['lastMessage']);
	   	$msgData = \Helper::formatArrayShape($msgData);


	   	$author = !boolval($msgData['fromMe']) && $msgData['author'] != $msgData['pushName'] ? $msgData['pushName'] : (boolval($msgData['fromMe']) ? 'Me' : '');
		$author = is_numeric($author) ? $author.'@c.us' : $author;
		$convData['id'] = str_replace('s.whatsapp.net','c.us',$convData['id']);
		$id = ( boolval($msgData['fromMe']) ? 'true_' : 'false_') . $convData['id'] . '_'  . $msgData['id'];

		if(isset($msgData['metadata']) && isset($msgData['metadata']['quotedMessageId'])){
	   		$msgData['metadata']['quotedMessageId'] = ( boolval($msgData['metadata']['quotedMessage']['fromMe']) ? 'true_' : 'false_') . $convData['id'] . '_'  . $msgData['metadata']['quotedMessageId'];
	   	}
		
	   	if($msgData['body'] != '' || ($msgData['body'] == '' && in_array($msgData['messageType'],['locationMessage']))){
	   		$item = [
	   			'id' => $id,
	   			'body'=> isset($msgData['body']) && !empty($msgData['body']) ? $msgData['body'] : '',
	   			'type' => $this->getType($msgData['messageType']),
	   			'fromMe' => boolval($msgData['fromMe']),
	   			'chatId' => $convData['id'],
		   		'author' => $author,
	   			'chatName' => $msgData['chatName'],
	   			'pushName' => $msgData['pushName'],
	   			'time' => $msgData['time'],
	   			'timeFormatted' => $msgData['timeFormatted'],
	   			'status' => $msgData['status'],
	   			'statusText' => $msgData['statusText'],
	   			'deviceSentFrom' => $msgData['deviceSentFrom'],
	   			'fileName' => isset($msgData['fileName']) ? $msgData['fileName'] : '',
		   		'caption' => isset($msgData['caption']) ? $msgData['caption'] : '',
	   			'channel' => str_replace('wlChannel','',$mainData['sessionId']),
	   			'senderName' =>  boolval($msgData['fromMe']) == 1 ? $author : $msgData['pushName'],
	   			'metadata' => isset($msgData['metadata']) ? $msgData['metadata'] : [],
	   		];
	   		$webhooks = $this->getWebhooksURL($mainData['sessionId']);

	   		if($webhooks != null && isset($webhooks->messageNotifications) && !empty($webhooks->messageNotifications)){
	   			$this->fireWebhook([
	   				'event' => 'message-new',
	   				'messages' => [$item]
	   			],$webhooks->messageNotifications);
	   		}	   		
	   	}
	   	return 1;
	}

	public function updateMessage($mainData){
		$msgData = $mainData['messageStatus'];
	   	$sessionId = $mainData['sessionId'];

   		$webhooks = $this->getWebhooksURL($sessionId);

   		$dataArr = [];
		$chatId = '';
		$event = '';
		if(str_contains($msgData['chatId'], '@g.us')){
			$chatId = $msgData['chatId'];
		}else{
			$chatId = str_replace('s.whatsapp.net','c.us',$msgData['chatId']);
		}		
		$msgId = $msgData['fromMe'].'_'.$chatId.'_'.$msgData['id'];

		if(in_array($msgData['status'], [3,4])){	   
			$dataArr[] = [
				'id' => $msgId,
				'status' => lcfirst($msgData['statusText']),
				'chatId' => $chatId,
			];
   			$event = 'message-status';
   		}else if($msgData['status'] == null && $msgData['statusText'] == null){
   			$msgData['status'] = 5;
   			$msgData['statusText'] = 'DeletedForAll';
   			$event = 'message-delete-all';
   			$dataArr[] = [
				'id' => $msgId,
				'status' => lcfirst($msgData['statusText']),
				'chatId' => $chatId,
			];
	   		 
   		}

   		if($webhooks != null && isset($webhooks->ackNotifications) && !empty($webhooks->ackNotifications)){
   			return $this->fireWebhook([
				'event' => $event,
   				'ack' => $dataArr
   			],$webhooks->ackNotifications);
   		}	
   		return 1;
	}


	public function updateConversation($mainData){
		$convData = $mainData['conversationStatus'];
	   	$chatObj = $convData['data'];
	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
		$myData = [];
		if(isset($chatObj['id'])){
            $myData['chatId'] = str_replace('s.whatsapp.net','c.us',$chatObj['id']);
        }
   		if(isset($chatObj['conversationTimestamp'])){
            $myData['last_time'] = $chatObj['conversationTimestamp'];
        }
        if(isset($chatObj['archive'])){
            $myData['archived'] = $chatObj['archive'] == 'true' ? true : false;
        }
        if(array_key_exists('pin', $chatObj)){
        	if($chatObj['pin'] == null){
        		$myData['pinned'] = 0;
        	}else{
	            $myData['pinned'] = (int)$chatObj['pin'];
        	}
        }
        if(isset($chatObj['unreadCount'])){
            $myData['unreadCount'] = abs($chatObj['unreadCount']);
        }
        if(array_key_exists('mute', $chatObj)){
        	$myData['muted'] = (int)$chatObj['mute'];
            if($myData['muted'] > 0){
                $myData['mutedUntil'] = date('Y-m-d H:i:s',$chatObj['mute'] / 1000);
            }
        }
   		if($webhooks != null && isset($webhooks->ackNotifications) && !empty($webhooks->ackNotifications)){
   			return $this->fireWebhook([
				'event' => 'dialog-update',
	   			'data' => $myData
   			],$webhooks->ackNotifications);
   		}	  	
	   	
   		return 1;  	
	}

	public function deleteDialog($mainData){
		$msgData = $mainData['chatDeleted'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData['chatId'] = str_replace('s.whatsapp.net','c.us',$msgData['id']);
	   	unset($msgData['id']);

	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
	   	if($webhooks != null && isset($webhooks->ackNotifications) && !empty($webhooks->ackNotifications)){
   			return $this->fireWebhook([
				'event' => 'dialog-delete',
	   			'data' => $msgData
   			],$webhooks->ackNotifications);
   		}	  	
	   	return 1;
	}

	// Still Not Implemented inside Node
	public function updateConnectionStatus($mainData){
		$status = $mainData['connectionStatus'];
	   	$sessionId = $mainData['sessionId'];

	   	$webhooks = $this->getWebhooksURL($sessionId);

   		if($webhooks != null && isset($webhooks->messageNotifications) && !empty($webhooks->messageNotifications)){
   			$this->fireWebhook([
   			'event' => 'connectionStatus',
   			'type' => $status['type'],
   			],$webhooks->messageNotifications);
   		}
   		return 1;	   		
	}

	public function getWebhooksURL($name){
		$deviceObj = DeviceSetting::where('sessionId',$name)->first();
		if($deviceObj){
			return DeviceSetting::getData($deviceObj)->webhooks;
		}
		return null;
	}

	public function fireWebhook($data,$url=null){
		return WebhookCall::create()
			   ->url($url)
			   ->payload($data)
			   ->doNotSign()
			   ->dispatch();
	}

	//'document','video','ptt','image','vcard','location','chat'
	public function getType($type){
		$type = str_replace('Message','',$type);
		if($type == 'text'){
		 	return 'chat';
		}else{
			$type = str_replace('Message','',$type);
			if($type == 'audio'){
				return 'ptt';
			}else if($type == 'contact'){
				return 'vcard';
			}else{
				return $type;
			}
		}
	}
}
