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

	    if(isset($mainData['conversation']) && isset($mainData['conversation']['lastMessage']) && $mainData['conversation']['lastMessage']['messageType'] != null){
	    	$this->incomingMessage($mainData);
	    }
	   	
	   	if(isset($mainData['conversationStatus'])){
	    	$this->updateConversation($mainData);
	    }

	    if(isset($mainData['messageStatus'])){
	    	$this->updateMessage($mainData);
	    }

	    if(isset($mainData['chatDeleted'])){
	     	$this->deleteDialog($mainData);
	    }

	    if(isset($mainData['allDialogs'])){
	    	$this->syncDialogs($mainData);
	    }

	    if(isset($mainData['allMessages'])){
	    	$this->syncMessages($mainData);
	    }

	    if(isset($mainData['connectionStatus'])){
	    	$this->updateStatus($mainData);
	    }

   		return 1;	   		
	}

	public function updateStatus($mainData){
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

	public function incomingMessage($mainData){
		$convData = $mainData['conversation'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData = $mainData['conversation']['lastMessage'];

	   	$msgData = $this->formatMessage($msgData);

	   	if(in_array($msgData['messageType'], ['forwardMessage','replyMessage','extendedTextMessage','buttonsMessage','templateMessage','listMessage','reactionMessage','contactMessage','locationMessage','mentionMessage','buttons_response'])){
	   		$body = json_encode($msgData['body']);
	   	}else{
	   		$body = $msgData['body'];
	   	}

	   	// $messageObj = Message::where('id','LIKE','%'.$msgData['id'])->where('sessionId',$sessionId)->first();
	   	$fromMe = $msgData['fromMe'] == 'true' ? 1 : 0;
	   	$author = !$fromMe && $msgData['author'] != $msgData['pushName'] ? $msgData['pushName'] : ($fromMe ? 'Me' : '');
		$convData['id'] = str_replace('s.whatsapp.net','c.us',$convData['id']);
	   	// Insert incoming message
	   	if(/*!$messageObj &&*/ $body != ''){
	   		$item = [
	   			'id' => $msgData['id'],
	   			'sessionId' => $sessionId,
	   			'body'=> $body,
	   			'messageType' => $msgData['messageType'],
	   			'fileName' => $msgData['fileName'],
		   		'caption' => $msgData['caption'],
	   			'fromMe' => $fromMe,
	   			'dialog_id' => $convData['id'],
		   		'author' => !$fromMe ? $msgData['chatName'] : 'Me' ,
	   			'chatName' => $msgData['chatName'],
	   			'pushName' => $msgData['pushName'],
	   			'time' => $msgData['time'],
	   			'timeFormatted' => $msgData['timeFormatted'],
	   			'status' => $msgData['status'],
	   			'statusText' => $msgData['statusText'],
	   			'deviceSentFrom' => $msgData['deviceSentFrom'],
	   		];
	   		// Message::create($item);
	   		$allMessages = [];
	   		// $fileName = $sessionId.'.json';
	     //    $path = storage_path().'/logs/pm2s/'.$fileName;
	     //    if(file_exists($path)){
	     //        // read file data then update it
	     //        $fileData = file_get_contents($path);
	     //        $data = json_decode($fileData);
	     //        $allMessages = isset($data->messages) ? $data->messages : [];
	     //    }
	   		$item = $this->formMessageForWloopWebhook($item,$msgData,$convData['id'],$allMessages);

	   		$webhooks = $this->getWebhooksURL($item['sessionId']);
	   		unset($item['sessionId']);

	   		if($webhooks != null && isset($webhooks->messageNotifications) && !empty($webhooks->messageNotifications)){
	   			$this->fireWebhook([
	   			'event' => 'newMessage',
	   			'messages' => [$item]
	   			],$webhooks->messageNotifications);
	   		}	   		
	   	}

	   	// insert dialog or update it
		// $dialogObj = Dialog::find($convData['id']);
		// if($dialogObj){
		// 	$dialogObj->last_time = $convData['lastTime'];
		// 	if($author != '' && !$fromMe){
		// 		$dialogObj->name = $msgData['pushName'];
		// 	}
		// 	$dialogObj->save();
		// }else{
		// 	$dialogData = [
		// 		'sessionId' => $sessionId,
		// 		'id' => $convData['id'],
		// 		'last_time' => $convData['lastTime'],
		// 	];
		// 	if($author != '' && !$fromMe){
		// 		$dialogData['name'] = $msgData['pushName'];
		// 	}
		// 	Dialog::create($dialogData);
		// }
	}

	public function updateConversation($mainData){
		$convData = $mainData['conversationStatus'];
	   	$sessionId = $mainData['sessionId'];
	   	$items = $convData['data'];
	   	$myData = [];
	   	foreach($items as $oneKey => $oneItem){
	   		if(isset($oneItem['id']) && $oneItem['id'] != '@status@broadcast'){
	   			$myData [] = [
	   				'id' => str_replace('s.whatsapp.net','c.us',$oneItem['id']),
	   				'pinned' => isset($items[$oneKey+1]['pin']) ? $items[$oneKey+1]['pin'] : (isset($items[$oneKey+2]['pin']) ? $items[$oneKey+2]['pin'] : null),
	   				'archived' => isset($items[$oneKey+2]['archive']) ? $items[$oneKey+2]['archive'] : (isset($items[$oneKey+2]['archive']) ? $items[$oneKey+2]['archive'] : null),
	   			];
	   		}
	   	}	   	

		// foreach ($myData as $key => $item) {
		//    	$image = $this->getImage($item['id'],$sessionId);
	 //   		if($image != null){
	 //   			$fileName = $sessionId.'/chats.json';
		//         $path = storage_path().'/logs/pm2s/'.$fileName;
		//         if(file_exists($path)){
		//             // read file data then update it
		//             $fileData = file_get_contents($path);
		//             $data = json_decode($fileData);
		//             $dialogs = isset($data->chats) ? $data->chats : [];
		//             foreach ($dialogs as $key => $value) {
		//             	if(isset($value) && isset($value->id) && str_replace('s.whatsapp.net','c.us',$value->id) == $item['id']){
		//             		$value->image = $image;
		//             	}
		//             }
		//             file_put_contents($path, json_encode($data));
		//         }
	 //   		}
	 //   	}

	   // 	foreach ($myData as $key => $item) {
	   // 		$dialogObj = Dialog::where('id',$item['id'])->where('sessionId',$sessionId)->first();
		  //  	if($dialogObj){
		  //  		$dialogObj->pinned = $item['pinned'] == null ? null : ($item['pinned'] > 1 ? 1 : 0) ;
		  //  		$dialogObj->archived = $item['archived'] == null ? null : ($item['archived'] == 'true' ? 1 : 0) ;
		  //  		$image = $this->getImage($item['id'],$sessionId);
		  //  		if($image != null){
		  //  			$dialogObj->image = $image;
		  //  		}
		  //  		$dialogObj->save();
		  //  	}else{
		  //  		$dialogData = [
				// 	'sessionId' => $sessionId,
				// 	'id' => $item['id'],
				// 	'archived' => $item['archived'] == null ? null : ($item['archived'] == 'true' ? 1 : 0),
				// 	'pinned' => $item['pinned'] == null ? null : ($item['pinned'] > 1 ? $item['pinned'] : 0),
				// ];
				// Dialog::create($dialogData);
		  //  	}
	   // 	}
	}

	public function updateMessage($mainData){
		$msgData = $mainData['messageStatus'];
	   	$sessionId = $mainData['sessionId'];
   		$dataArr = [];
	  
		$chatId = '';
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

   			$webhooks = $this->getWebhooksURL($sessionId);
	   		if($webhooks != null && isset($webhooks->ackNotifications) && !empty($webhooks->ackNotifications)){
	   			return $this->fireWebhook([
   					'event' => 'newMessageStatus',
	   				'ack' => $dataArr
	   			],$webhooks->ackNotifications);
	   		}	 
   		}else if($msgData['status'] == null && $msgData['statusText'] == null){
   			$msgData['status'] = 5;
   			$msgData['statusText'] = 'DeletedForAll';
   			$dataArr[] = [
				'id' => $msgId,
				'status' => lcfirst($msgData['statusText']),
				'chatId' => $chatId,
			];
   			$webhooks = $this->getWebhooksURL($sessionId);
	   		if($webhooks != null && isset($webhooks->ackNotifications) && !empty($webhooks->ackNotifications)){
	   			return $this->fireWebhook([
   					'event' => 'deleteMessageForAll',
	   				'ack' => $dataArr
	   			],$webhooks->ackNotifications);
	   		}	 
   		}
   		return 1;
	}

	public function deleteDialog($mainData){
		$msgData = $mainData['chatDeleted'];
	   	$sessionId = $mainData['sessionId'];
	   	$msgData['id'] = str_replace('s.whatsapp.net','c.us',$msgData['id']);
	   	// $dialogObj = Dialog::where('id',$msgData['id'])->where('sessionId',$sessionId)->first();
	   	// if($dialogObj){
	   	// 	$dialogObj->deleted_by = 1;
	   	// 	$dialogObj->deleted_at = date('Y-m-d H:i:s');
	   	// 	$dialogObj->save();
	   	// }
	}

	public function syncDialogs($mainData){
		$dialogs = $mainData['allDialogs']['data'];		
	   	$sessionId = @$mainData['sessionId'];
	   	// foreach ($dialogs as $key => $dialog) {
	   	// 	if($key != 'status@broadcast' && isset($sessionId)){
	   	// 		$key = str_replace('s.whatsapp.net','c.us',$key);
	   	// 		$dialogObj = Dialog::where('id',$key)->where('sessionId',$sessionId)->first();
		   // 		if(!$dialogObj){
		   // 			$dialogObj = new Dialog;
		   // 			$dialogObj->id = $key;
		   // 		}
		   // 		$dialogObj->sessionId = $sessionId;
		   // 		if(isset($dialog['unreadCount'])){
		   // 			$dialogObj->unreadCount = $dialog['unreadCount'];
		   // 		}
		   // 		if(isset($dialog['readOnly'])){
		   // 			$dialogObj->readOnly = $dialog['readOnly'] == 'true' ? 1 : 0;
		   // 		}
		   // 		if(isset($dialog['ephemeralExpiration'])){
		   // 			$dialogObj->ephemeralExpiration = $dialog['ephemeralExpiration'];
		   // 		}
		   // 		if(isset($dialog['notSpam'])){
		   // 			$dialogObj->notSpam = $dialog['notSpam'] == 'true' ? 1 : 0;
		   // 		}
		   // 		if(isset($dialog['unreadMentionCount'])){
		   // 			$dialogObj->unreadMentionCount = $dialog['unreadMentionCount'];
		   // 		}
		   // 		if(isset($dialog['archive'])){
		   // 			$dialogObj->archived = $dialog['archive'] == 'true' ? 1 : null;
		   // 		}
		   // 		if(isset($dialog['conversationTimestamp'])){
		   // 			$dialogObj->last_time = $dialog['conversationTimestamp'];
		   // 		}

		   // 		$dialogObj->save();
	   	// 	}
	   	// }
	   	return 1;
	}

	public function syncMessages($mainData){
		$message = $mainData['allMessages']['data'];
	   	$sessionId = $mainData['sessionId'];
		$fromMe = $message['message'] && $message['message']['fromMe'] == 'true' ? 1 : 0;
		$message['key']['remoteJid'] = str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid']);
   		// $dialogObj = Dialog::where('id',$message['key']['remoteJid'])->where('sessionId',$sessionId)->first();
   		// if(!$dialogObj){
   		// 	$dialogObj = new Dialog;
   		// 	$dialogObj->id = $message['key']['remoteJid'];
   		// 	$dialogObj->sessionId = $sessionId;
   		// 	$dialogObj->name = $message['pushName'] != null ? $message['pushName'] : $message['message']['pushName'];
   		// 	$dialogObj->save();
   		// }else{
   		// 	if(isset($message['pushName']) || ($message['message'] != null && isset($message['message']) && isset($message['message']['pushName']))){
   		// 		$dialogObj->name = $message['pushName'] != null ? $message['pushName'] : $message['message']['pushName'];
   		// 		$dialogObj->save();
   		// 	}	
   		// }

   		// if($message['message'] != null) {
   		// 	$msgData = $message['message'];
	   	// 	$msgData = $this->formatMessage($msgData);

   		// 	if(in_array($msgData['messageType'], ['forwardMessage','replyMessage','extendedTextMessage','buttonsMessage','templateMessage','listMessage','reactionMessage','contactMessage','locationMessage','buttons_response','mentionMessage'])){
		   // 		$body = json_encode($msgData['body']);
		   // 	}else{
		   // 		$body = $msgData['body'];
		   // 	}
		   	
		   // 	$messageObj = Message::where('id','LIKE','%'.$msgData['id'])->where('sessionId',$sessionId)->first();
		   // 	if(!$messageObj && $body != ''){
		   // 		$item = [
		   // 			'id' => $msgData['id'],
		   // 			'sessionId' => $sessionId,
		   // 			'body'=> $body,
		   // 			'messageType' => $msgData['messageType'],
		   // 			'fileName' => $msgData['fileName'],
		   // 			'caption' => $msgData['caption'],
		   // 			'fromMe' => $fromMe,
		   // 			'dialog_id' => str_replace('s.whatsapp.net','c.us',$message['key']['remoteJid']),
		   // 			'author' => !$fromMe ? $msgData['chatName'] : 'Me' ,
		   // 			'chatName' => $msgData['chatName'],
		   // 			'pushName' => $msgData['pushName'] != null ? $msgData['pushName'] : $message['pushName'],
		   // 			'time' => $msgData['time'],
		   // 			'timeFormatted' => $msgData['timeFormatted'],
		   // 			'status' => in_array($msgData['status'], [3,4]) ? $msgData['status'] : 2,
		   // 			'statusText' => in_array($msgData['status'], [3,4]) && $msgData['statusText'] != null ? $msgData['statusText'] : 'Sent',
		   // 			'deviceSentFrom' => $msgData['deviceSentFrom'],
		   // 		];
		   // 		Message::create($item);
		   // 	}else if($messageObj && $body != ''){
		   // 		if($messageObj->time == null && $msgData && $msgData['time']){
			  //  		$messageObj->time = $msgData['time'];
			  //  		$messageObj->timeFormatted = $msgData['timeFormatted'];
		   // 		}
   		// 		$messageObj->save();
		   // 	}
   		// }
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

	public function getImage($key,$sessionId){
		$phone = explode('@', $key)[0];
		$phone = explode(':', $phone)[0];
		$response = Http::post(env('URL_WA_SERVER').'/users/displayPicture?id='.$sessionId, ['phone'=>$phone]);
        $res = json_decode($response->getBody());
        if(isset($res->success) && $res->success){
            return $res->data;
        }
        return null;
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
		   			if(isset($items[$oneKey+1]['urlButton'])){
		   				$buttonType = [
		   					'title' => $items[$oneKey+1]['urlButton']['title'],
		   					'url' => $items[$oneKey+2]['urlButton']['url'],
		   				];
		   				$dataType = 'urlButton';
		   			}else if(isset($items[$oneKey+1]['callButton'])){
		   				$buttonType = [
		   					'title' => $items[$oneKey+1]['callButton']['title'],
		   					'phone' => $items[$oneKey+2]['callButton']['phone'],
		   				];
		   				$dataType = 'callButton';
		   			}else if(isset($items[$oneKey+1]['normalButton'])){
		   				$buttonType = [
		   					'title' => $items[$oneKey+1]['normalButton']['title'],
		   					'id' => $items[$oneKey+2]['normalButton']['id'],
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
						$title = array_keys($items[$x+1]['rows'][0])[0] == 'title' ? $items[$x+1]['rows'][0]['title'] : '';
						$description = array_keys($items[$x+2]['rows'][0])[0] == 'description' ? $items[$x+2]['rows'][0]['description'] : '';
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

	public function formMessageForWloopWebhook($item,$msgData,$dialogID,$allMessages){
		$item['channel'] = str_replace('wlChannel','',$item['sessionId']);
   		$item['chatId'] = $dialogID;
   		$item['type'] = $this->getType($item['messageType']);
   		$item['message_type'] = $item['type'];
   		$item['senderName'] = $item['fromMe'] == 1 ? $item['author'] : $item['pushName'];
   		$item['metadata'] = [];
		$item['author'] = is_numeric($item['author']) ? $item['author'].'@c.us' : $item['author'];
		$item['id'] = ($item['fromMe'] ? 'true_' : 'false_') . $item['chatId'] . '_'  . $item['id'];
   		if($msgData['messageType'] == 'buttonsMessage'){
   			$replyButtons = [];
   			foreach($msgData['body']['buttons'] as $button){
   				$replyButtons[]= [
   					'id' => $button['id'],
   					'displayText' => $button['title'],
   				];
   			}
   			$item['body'] = $msgData['body']['content'];
   			$item['metadata'] = [
   				'footer' => $msgData['body']['footer'],
   				'replyButtons' => $replyButtons,
   			];
   			$item['type'] = 'chat';
   			if($msgData['body']['hasPreview'] == 1){
   				$item['body'] = $msgData['body']['image'];
   				$item['caption'] = $msgData['body']['content'] . " \r\n \r\n " .$msgData['body']['footer']; 
   				$item['type'] = 'image';
   			}else{
   				$item['metadata']['title'] = $msgData['body']['title']; 
   				$item['body'] = $msgData['body']['content'];
   			}

   		}else if($msgData['messageType'] == 'templateMessage'){
   			$replyButtons = [];
   			foreach($msgData['body']['buttons'] as $button){
   				$replyButtons[]= [
   					'id' => $button['index'],
   					'displayText' => $button[array_keys($button)[1]]['title'],
   				];
   			}
   			$item['body'] = $msgData['body']['hasPreview'] == 1 ? $msgData['body']['image'] : $msgData['body']['content'];
   			$item['caption'] = $msgData['body']['hasPreview'] == 1 ? $msgData['body']['content'] : '';
   			$item['metadata'] = [
   				'footer' => $msgData['body']['footer'],
   				'replyButtons' => $replyButtons,
   			];
   			$item['type'] = $msgData['body']['hasPreview'] == 1 ? 'image' : 'chat';
   			if($msgData['body']['hasPreview'] == 1){
   				$item['body'] = $msgData['body']['image'];
   				$item['caption'] = $msgData['body']['content'] . " \r\n \r\n " .$msgData['body']['footer']; 
   				$item['type'] = 'image';
   			}else{
   				$item['metadata']['title'] = $msgData['body']['title']; 
   				$item['body'] = $msgData['body']['content'];
   			}
   		}else if($msgData['messageType'] == 'forwardMessage'){
			$item['isForwarded'] = 1;
			$item['type'] = 'chat';
			if(isset($msgData['body']) && isset($msgData['body']['contextInfo']) && isset($msgData['body']['contextInfo']['isForwarded'])){
				$item['isForwarded'] = 1;
				$item['type'] = 'forward';
			}
			$item['body'] = $msgData['body']['text'];
			$item['metadata'] = (object)[
				'message_type' => $item['type'],
   				'msg' => $msgData['body'],
   			];
		}else if($msgData['messageType'] == 'disappearingMessage'){
			$item['type'] = 'chat';
			$item['metadata'] = (object)[
				'message_type' => 'disappearing',
   				'expiration' => $msgData['expiration'],
   				'expirationFormatted' => $msgData['expirationFormatted'],
   			];
		}else if($msgData['messageType'] == 'videoMessage'){
			$item['caption'] = $msgData['caption'];
		}else if($msgData['messageType'] == 'sticker'){
			$item['type'] = 'image';
			$item['metadata'] = (object)[
				'message_type' => 'sticker',
   			];
		}else if($msgData['messageType'] == 'gif'){
			$item['type'] = 'video';
			$item['metadata'] = (object)[
				'message_type' => 'gif',
   			];
		}else if($msgData['messageType'] == 'mentionMessage'){
			$item['type'] = 'chat';
			$item['body'] = $msgData['body']['text'];
			$item['metadata'] = (object)[
				'message_type' => 'mention',
				'msg' => json_encode($msgData['body'])
   			];
		}else if($msgData['messageType'] == 'contactMessage'){
			$item['type'] = 'vcard';
			$item['body'] = 'BEGIN:VCARD\n' . 'VERSION:3.0\n' . 'FN:' . $msgData['body']['name'] .' \n ' . ' ORG: ' . $msgData['body']['organization'] . ' \n' . 'TEL;type=CELL;type=VOICE;waid=' . $msgData['body']['phone'] . ':+' . $msgData['body']['phone'] . '\n' . 'END:VCARD';
			$item['metadata'] = (object)[
				'message_type' => 'contact',
				'name' => $msgData['body']['name'],
				'organization' => $msgData['body']['organization'],
				'phone' => $msgData['body']['phone'],
   			];
		}else if($msgData['messageType'] == 'locationMessage'){
			$item['type'] = 'location';
			$item['body'] = '';
			$item['metadata'] = (object)[
				'latitude' => $msgData['body']['latitude'],
                'longitude' => $msgData['body']['longitude'],
   			];
		}else if($msgData['messageType'] == 'list'){
			$item['type'] = 'list';
			$item['body'] = '';
			$item['metadata'] = $msgData['body'];
		}else if($msgData['messageType'] == 'buttons_response'){
			// Logger($msgData);
			$quotedMsgObj= null;
			foreach ($allMessages as $key => $value) {
            	if(isset($value->message) && isset($value->message->id) && $value->message->id == $msgData['body']['quotedMsgId']){
            		$quotedMsgObj = $value->message;
            	}
            }
   			$item['type'] = 'buttons_response';
   			$item['body'] = $msgData['body']['selectedButtonText'];
   			$item['metadata'] = (object)[
				'selectedButtonId' => $msgData['body']['selectedButtonID'],
				'type' => $msgData['body']['type'],
   			];
   			$item['quotedMsgType'] = 'chat';
   			$item['quotedMsgId'] = 'true_'.str_replace('@s.whatsapp.net','@c.us',$msgData['body']['quotedChatId']).'_'.$msgData['body']['quotedMsgId'];
   			if($quotedMsgObj){
   				$item['quotedMsgBody'] = $quotedMsgObj->body;
   			}
   		}else if($msgData['messageType'] == 'replyMessage'){
            $item['type'] = 'chat';
            $item['body'] = $msgData['body']['text'];
			$quotedMsgObj= null;
            foreach ($allMessages as $key => $value) {
            	if($value->message->id == $msgData['body']['quotedMessage']['id']){
            		$quotedMsgObj = $value->message;
            	}
            }
            if($quotedMsgObj){
                $item['quotedMsgBody'] =  isset($quotedMsgObj->body) && json_decode($quotedMsgObj->body) && isset(json_decode($quotedMsgObj->body)->content) ? json_decode($quotedMsgObj->body)->content : $quotedMsgObj->body ;
                $item['metadata'] = [
                    'type' => 'reply',
                    'quotedMsgBody' => json_decode($quotedMsgObj->body)
                ];
            }
        }   

   		unset($item['dialog_id']);
   		unset($item['messageType']);
   		return $item;
	}

}
