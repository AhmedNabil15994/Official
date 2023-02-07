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

	    if(isset($mainData['conversation']) && isset($mainData['isGroup'])){
	    	return $this->newGroup($mainData);
	    }

	    if(isset($mainData['conversationUpdate'])){
	    	return $this->updateGroup($mainData);
	    }

	    if(isset($mainData['messageStatus'])){
	    	return $this->updateMessage($mainData);
	    }

	    if(isset($mainData['conversationStatus'])){
	    	return $this->updateConversation($mainData);
	    }

	    if(isset($mainData['conversationPresence'])){
	    	return $this->updatePresence($mainData);
	    }

	    if(isset($mainData['conversationDelete'])){
	     	return $this->deleteDialog($mainData);
	    }

	    if(isset($mainData['connectionStatus'])){
	    	return $this->updateConnectionStatus($mainData);
	    }

	    if(isset($mainData['business'])){
	    	return $this->businessData($mainData);
	    }

   		return 1;	   		
	}

	public function incomingMessage($mainData){
		$convData = $mainData['conversation'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData = (array) json_decode($mainData['conversation']['lastMessage']);
	   	$msgData = \Helper::formatArrayShape($msgData);

	   	$item = \Helper::formatMessages($msgData,$sessionId);

	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
   		if($webhooks != null && isset($webhooks->messageNotifications) && !empty($webhooks->messageNotifications)){
   			$this->fireWebhook([
   				'event' => 'message-new',
   				'messages' => $item,
   			],$webhooks->messageNotifications);
   			if($item['type'] == 'order' && isset($webhooks->businessNotifications) && !empty($webhooks->businessNotifications)){
   				$products = [];
   				$response = Http::post(env('URL_WA_SERVER').'/business/getOrder?id='.$sessionId,[
		            'orderId' => $item['metadata']['orderId'],
		            'orderToken' => $item['metadata']['token'],
		        ]);

		        $res = json_decode($response->getBody());
		        if($res->success){
		        	$products = $res->data->products;
		        }
   				$this->fireWebhook([
	   				'event' => 'orders-set',
	   				'data' => [
	   					'id' => $item['metadata']['orderId'],
						'token' => $item['metadata']['token'],
						'title' => $item['metadata']['orderTitle'],
						'sellerJid' => $item['metadata']['sellerJid'],
						'itemCount' => $item['metadata']['itemCount'],
						'price' => $item['metadata']['price'],
						'currency' => $item['metadata']['currency'],
						'time' => $item['time'],
						'chatId' => $item['chatName'],
						'products' => $products,
	   				],
	   			],$webhooks->businessNotifications);
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

		if(in_array($msgData['status'], [3,4,6])){	   
			$dataArr[] = [
				'id' => $msgId,
				'status' => lcfirst($msgData['statusText']),
				'chatId' => $chatId,
			];
   			$event = 'message-status';
   		}else if($msgData['status'] == null && $msgData['statusText'] == null){
   			$msgData['status'] = 6;
   			// $msgData['statusText'] = 'DeletedForAll';
   			$msgData['statusText'] = 'deleted';
   			$event = 'message-status';
   			// $event = 'message-delete-all';
   			$dataArr[] = [
				'id' => $msgId,
				'status' => lcfirst($msgData['statusText']),
				'chatId' => $chatId,
			];
	   		 
   		}else if(in_array($msgData['status'], ['starred','unstarred'])){
   			$event = 'message-status';
   			$dataArr[] = [
				'id' => $msgId,
				'status' => $msgData['status'],
				'chatId' => $chatId,
			];
   		}else if(in_array($msgData['status'], ['labelled','unlabelled'])){
   			$event = 'message-status';
   			$dataArr[] = [
				'id' => $msgId,
				'status' => $msgData['status'],
				'label_id' => $msgData['label_id'],
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

	public function newGroup($mainData){
		$convData = $mainData['conversation']['data'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData = (array) $convData;
	   	$msgData = \Helper::formatArrayShape($msgData);
	   	$participantsArr = [];
	   	foreach($msgData['participants'] as $key => $participant){
	   		if($key%2 == 0){
		   		$participantsArr[] = array_merge($msgData['participants'][$key], $msgData['participants'][$key+1]);
	   		}
	   	}
	   	$msgData['participants'] = $participantsArr;

	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
   		if($webhooks != null && isset($webhooks->chatNotifications) && !empty($webhooks->chatNotifications)){
   			$this->fireWebhook([
   				'event' => 'group-new',
   				'data' => $msgData,
   			],$webhooks->chatNotifications);
   		}	  
	   	return 1;
	}

	public function updateGroup($mainData){
		$convData = $mainData['conversationUpdate']['data'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData = (array) $convData;
	   	$msgData = \Helper::formatArrayShape($msgData);

	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
   		if($webhooks != null && isset($webhooks->chatNotifications) && !empty($webhooks->chatNotifications)){
   			$this->fireWebhook([
   				'event' => 'group-update',
   				'data' => $msgData,
   			],$webhooks->chatNotifications);
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
            $myData['unreadCount'] = $chatObj['unreadCount'];
        }
        if(array_key_exists('mute', $chatObj)){
        	$myData['muted'] = (int)$chatObj['mute'];
            if($myData['muted'] > 0){
                $myData['mutedUntil'] = date('Y-m-d H:i:s',$chatObj['mute'] / 1000);
            }
        }
        if(isset($chatObj['labeled'])){
            $myData['labelled'] = $chatObj['labeled'] == 'true' ? true : false;
            $myData['label_id'] = (int)$chatObj['label_id'];
        }
   		if($webhooks != null && isset($webhooks->chatNotifications) && !empty($webhooks->chatNotifications)){
   			return $this->fireWebhook([
				'event' => 'dialog-update',
	   			'data' => $myData
   			],$webhooks->chatNotifications);
   		}	  	
	   	
   		return 1;  	
	}

	public function deleteDialog($mainData){
		$msgData = $mainData['conversationDelete'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData['chatId'] = str_replace('s.whatsapp.net','c.us',$msgData['id']);
	   	unset($msgData['id']);

	   	$webhooks = $this->getWebhooksURL($mainData['sessionId']);
	   	if($webhooks != null && isset($webhooks->chatNotifications) && !empty($webhooks->chatNotifications)){
   			return $this->fireWebhook([
				'event' => 'dialog-delete',
	   			'data' => $msgData
   			],$webhooks->chatNotifications);
   		}	  	
	   	return 1;
	}

	public function updatePresence($mainData){
	   	$sessionId = $mainData['sessionId'];
		$convData = $mainData['conversationPresence']['data'];
	   	$newData = [
	   		'chatId' => str_replace('s.whatsapp.net','c.us',$convData['id']),
	   		'presenceData' => [
	   			'phone' => str_replace('@s.whatsapp.net','',key($convData['presences'])),
	   			'presence' => reset($convData['presences'])['lastKnownPresence'] == 'composing' ? 'typing' : reset($convData['presences'])['lastKnownPresence'],
	   		],
	   	];

		$webhooks = $this->getWebhooksURL($mainData['sessionId']);
	   	if($webhooks != null && isset($webhooks->chatNotifications) && !empty($webhooks->chatNotifications)){
   			return $this->fireWebhook([
				'event' => 'dialog-presence',
	   			'data' => $newData
   			],$webhooks->chatNotifications);
   		}	  	
	   	return 1;
	}

	public function businessData($mainData){
		$sessionId = $mainData['sessionId'];
		$event = $mainData['business']['type'];
		$eventData = $mainData['business']['data'];
		if(str_contains($event, 'labels') || str_contains($event, 'replies')){
			$webhooks = $this->getWebhooksURL($sessionId);
		   	if($webhooks != null && isset($webhooks->businessNotifications) && !empty($webhooks->businessNotifications)){
	   			return $this->fireWebhook([
					'event' => $event,
		   			'data' => !str_contains($event, 'delete') ? json_decode($eventData) : $eventData
	   			],$webhooks->businessNotifications);
	   		}	 
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
}
