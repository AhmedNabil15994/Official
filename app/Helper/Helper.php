<?php
use Illuminate\Support\Arr;

class Helper
{   
     // 100 = x + .15x
     // .15x = 100 - x
     // x = 100 - x * (100/15) 
    // 100 = x + 100/15 x
    // 100 = 115/15 x
    // x = 100 * 15/115

    public static function reformDate($time){
        $diff = (time() - $time ) / (3600 * 24);
        $date = \Carbon\Carbon::parse(date('Y-m-d H:i:s'));
        if(round($diff) == 0 && round($diff) < 1){
            return date('h:i A',$time);
        }else if($diff>0 && $diff<=1){
            return trans('main.yesterday');
        }else if($diff > 1 && $diff < 7){
            $myDate = \Carbon\Carbon::parse(date('Y-m-d H:i:s',$time));
            return $myDate->locale('en')->dayName;
        }else{
            return date('Y-m-d',$time);
        }
    }

    public static function formatMessages($msgData,$sessionId,$noChannel=false){
        $author = $msgData['fromMe'] == 'false' && $msgData['author'] != $msgData['pushName'] && !str_contains($msgData['remoteJid'], '@g.us') ? $msgData['pushName'] : ($msgData['fromMe'] == 'true' ? 'Me' : $msgData['author']);
        $author = is_numeric($author) ? $author.'@c.us' : $author;
        $remoteJid = $msgData['remoteJid'];
        $remoteJid = str_replace('s.whatsapp.net','c.us',$remoteJid);
        $id = ( $msgData['fromMe'] == 'true' ? 'true_' : 'false_') . $remoteJid . '_'  . $msgData['id'];

        $fromMe = '';
        if(isset($msgData['metadata']) && isset($msgData['metadata']['quotedMessageId'])){
            $response = Http::post(env('URL_WA_SERVER').'/messages/getMessageByID?id='.$sessionId,['messageId'=>$msgData['metadata']['quotedMessageId']]);
            $fromMe = @json_decode($response->getBody())->data->fromMe;
            $msgData['metadata']['quotedMessageId'] =  $fromMe. '_' . $remoteJid . '_'  . $msgData['metadata']['quotedMessageId'];
            if(isset($msgData['metadata']['fromMe']) && $fromMe != ''){
                $msgData['metadata']['fromMe'] = $fromMe;
            }
            if(isset($msgData['metadata']['quotedMessage']) && isset($msgData['metadata']['quotedMessage']['fromMe']) && $fromMe != ''){
                $msgData['metadata']['quotedMessage']['fromMe'] = $fromMe;
            }
        }
        if(isset($msgData['metadata']) && isset($msgData['metadata']['remoteJid'])){
            $msgData['metadata']['remoteJid'] = str_replace('s.whatsapp.net','c.us',$msgData['metadata']['remoteJid']);
        }

        if(isset($msgData['metadata']) && isset($msgData['metadata']['quotedMessage']) && isset($msgData['metadata']['quotedMessage']['remoteJid'])){
            $msgData['metadata']['quotedMessage']['remoteJid'] = str_replace('s.whatsapp.net','c.us',$msgData['metadata']['quotedMessage']['remoteJid']);
        }

        $labels = [];
        if(isset($msgData['labels']) && !empty($msgData['labels'])){
            foreach ($msgData['labels'] as $labelKey => $labelled) {
                if($labelled){
                    $labels[] = $labelKey;
                }
            }
        }

        $messages = [];
        if($msgData['body'] != '' || ($msgData['body'] == '' && in_array($msgData['messageType'],['locationMessage','order','reactionMessage']))){
            $messages = [
                'id' => $id,
                'body'=> $msgData['body'],
                'type' => self::getType($msgData['messageType']),
                'fromMe' => $msgData['fromMe'],
                'chatId' => $remoteJid,
                'author' => $author,
                'chatName' => $msgData['chatName'],
                'pushName' => $msgData['pushName'],
                'senderName' =>  $msgData['fromMe'] == 'true' ? $author : $msgData['pushName'],
                'time' => $msgData['time'],
                'status' => $msgData['status'],
                'statusText' => $msgData['statusText'],
                'deviceSentFrom' => $msgData['deviceSentFrom'],
                'fileName' => isset($msgData['fileName']) ? $msgData['fileName'] : '',
                'caption' => isset($msgData['caption']) ? $msgData['caption'] : '',
                'dateObj' => [
                    'date' => date('Y-m-d H:i:s',strtotime($msgData['timeFormatted'])),
                    'dateTimeZone' => $msgData['timeFormatted'],
                ],
                // Metadata Needs to be formatted because of (locationMessage) type and msg Id from Reaction and others
                'metadata' => isset($msgData['metadata']) ? $msgData['metadata'] : [],
                'labels' => $labels,
                'labelled' => isset($msgData['labeled']) ? $msgData['labeled'] : null,
                'starred' => isset($msgData['starred']) &&  ($msgData['starred'] == true || $msgData['starred'] == 'true') ? 1 : 0,
                'channel' => str_replace('wlChannel','',$sessionId),
            ];     
            if($noChannel){
                unset($messages['channel']);
            }  
        }
        return $messages;
    }

    //'document','video','ptt','image','vcard','location','chat'
    public static function getType($type){
        $type = str_replace('Message','',$type);
        if($type == 'text'){
            return 'text';
        }else{
            $type = str_replace('Message','',$type);
            if($type == 'audio'){
                return 'audio';
            }else if($type == 'contact'){
                return 'contact';
            }else{
                return $type;
            }
        }
    }

    public static function formatArrayShape(array $array, $delimiter = '.') { 
        if(is_array($array)){
            for ($i=0; $i <10 ; $i++) { 
                $array = self::removeFromArray($array);
            }
        }
        $multiDimensionalArray = [];
        foreach ($array as $key => $value) {
            Arr::set($multiDimensionalArray , $key, $value);
        }
        return $multiDimensionalArray;
        // $result = [];
        // $arr = [];
        // foreach ($array as $notations => $value) {
        //     $keys = explode($delimiter, $notations);
        //     $keys = array_reverse($keys);
        //     $lastVal = $value;

        //     foreach ($keys as $keyIndex => $key) {
        //         if(is_numeric($key) && is_array($lastVal)){
        //             if(isset($keys[$keyIndex + 3])){
        //                 $arr[$keys[$keyIndex + 3]][$keys[$keyIndex + 2]][$keys[$keyIndex + 1]][$key][array_keys($lastVal)[0]] = $lastVal[array_keys($lastVal)[0]];
        //             }else{
        //                 $arr[$keys[$keyIndex + 2]][$keys[$keyIndex + 1]][$key][array_keys($lastVal)[0]] = $lastVal[array_keys($lastVal)[0]];
        //             }
        //         }else{
        //             $lastVal = [
        //                 $key => $lastVal
        //             ];
        //         }
        //     }            
        //     $result = array_merge_recursive($result, $lastVal);
        // }

        // if(is_array($result)){
        //     for ($i=0; $i <10 ; $i++) { 
        //         $result = self::removeFromArray($result);
        //     }
        // }
        
        // $removed = $result;
       
        // $i = 0;
        // foreach ($arr as $key => $value) {
        //     $removed = self::reGenerateArray($removed,$key,$value,$i);
        //     $i++;
        // }
        
        // return $removed;
    }

    public static function reGenerateArray(&$arr,$key,$newValueToReplace,$type){
        array_walk($arr, function (&$v, $k ) use($key,$newValueToReplace,$type) {
            if($k === $key) {
                if($type < 1){
                    $v = $newValueToReplace;
                }else{
                    foreach($v as $oneKey => $one){
                        if(is_array($one)){
                            $newIndex =  array_keys($one)[0];
                            $newValueToReplace[$oneKey][$newIndex] = $one[$newIndex];
                        }else{
                            $newValueToReplace[$key][$oneKey] = $one;
                        }
                    }
                    $v = $newValueToReplace;
                }
            } elseif(is_array($v)) {
                self::reGenerateArray($v,$key,$newValueToReplace,$type);
            }
        });
        return $arr;
    }

    public static function removeFromArray(&$array) {   
        array_walk($array, function (&$v, $k ) use (&$array) {
            if(str_contains($k, '/')) {
                $newK = str_replace('/','',$k);
                unset($array[$k]);
                $array[$newK] = $v;
            }

            if(is_object($v)) {
                $array[$k] = is_object($v) ? (array) $v : str_replace('(object)','',$v) ;
            }

            if(is_array($v)) {
                self::removeFromArray($v);
            }
            
        });
        return $array;
    }

    public static function RedirectWithPostForm(array $data,$url) {
        $fullData = $data;
        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <script type="text/javascript">
                    function closethisasap() {
                        document.forms["redirectpost"].submit();
                    }
                </script>
            </head>
            <body onload="closethisasap();">
                <form name="redirectpost" method="post" action="<?PHP echo $url; ?>">
                    <?php
                    if (!is_null($fullData)) {
                        foreach ($fullData as $k => $v) {
                            if(is_object($v) || is_array($v)){
                                echo "<input type='hidden' name='".$k."' value='".json_encode((array)$v)."' >";
                            }else{
                                echo "<input type='hidden' name='".$k."' value='".$v."' >";
                            }
                        }
                    }
                   ?>
               </form>
            </body>
        </html>
        <?php
        exit;
    }

    static function getCountryCode() {
        $ip = \Request::ip();
        if($ip == "127.0.0.1" || $ip == "::1"){
            $ip = '197.40.252.75';
        }
        $location['countryCode'] = 'eg';
        return (object)$location;
    }

    static function reformMessage($msg){
        $dataObj = new \stdClass();
        $dataObj->id = json_decode($msg['metadata'])->msgId;
        $dataObj->body = $msg['body'];
        $dataObj->type = $msg['type'];
        $dataObj->chatId = \App\Models\ChatMessage::reformChatId($msg['chatId']);
        $dataObj->last_try = \App\Models\ChatDialog::reformDate($msg['last_try']/1000);
        return $dataObj;
    }

    static function calcTax($mainPrice){
        $tax = 15/100;
        $estimatedTax = $mainPrice * (15/115);
        return round($estimatedTax,2);
    }

    static function formatDate($date, $formate = "Y-m-d h:i:s A", $unix = false){
        $date = str_replace("," , '' , $date);
        $FinalDate = $unix != false ? gmdate($formate, $date) : date($formate, strtotime($date));
        return $FinalDate != '1970-01-01 12:00:00' ? $FinalDate : null;
    }

    static function formatDateForDisplay($date, $withTime = false){
        if($date == null || $date == "0000-00-00 00:00:00" || $date == "0000-00-00"){
            return '';
        }

        return $withTime != false ? date("m/d/Y h:i:s A", strtotime($date)) : date("m/d/Y", strtotime($date));
    }
    static function formatDateCustom($date, $format = "Y-m-d H:i:s", $custom = false) {
        if($date == null || $date == "0000-00-00 00:00:00" || $date == "0000-00-00" || $date == ""){
            return '';
        }

        $date = str_replace("," , '' , $date);

        $FinalDate = date($format, strtotime($date));

        if ($format == '24') {
            $FinalDate = date('Y-m-d', strtotime($date)) . ' 24:00:00';
        }

        if ($custom != false) {
            $FinalDate = date($format, strtotime($custom, strtotime($date)));
        }

        return $FinalDate != '1970-01-01 12:00:00' ? $FinalDate : null;
    }

    static function getFolderSize($path){
        $file_size = 0;
        if(file_exists($path)){
            foreach( \File::allFiles($path) as $file)
            {
                $file_size += $file->getSize();
            }
            $file_size = $file_size/(1024 * 1024);
            $file_size = number_format($file_size,2) . " MB ";
        }
        return $file_size;
    }

    static function fixPaginate($url, $key) {
        if(strpos($key , $url) == false){
            $url = preg_replace('/(.*)(?)' . $key . '=[^&]+?(?)[0-9]{0,4}(.*)|[^&]+&(&)(.*)/i', '$1$2$3$4$5$6$7$8$9$10$11$12$13$14$15$16$17$18$19$20', $url . '&');
            $url = substr($url, 0, -1);
            return $url ;
        }else{
            return $url;
        }
    }

    Static function GeneratePagination($source){
        $uri = \Request::getUri();
        $count = count($source);
        $total = $source->total();
        $lastPage = $source->lastPage();
        $currentPage = $source->currentPage();

        $data = new \stdClass();
        $data->count = $count;
        $data->total_count = $total;
        $data->current_page = $currentPage;
        $data->last_page = $lastPage;
        $next = $currentPage + 1;
        $prev = $currentPage - 1;

        $newUrl = self::fixPaginate($uri, "page");

        if(preg_match('/(&)/' , $newUrl) != 0 || strpos($newUrl , '?') != false ){
            $separator = '&';
        }else{
            $separator = '?';
        }

        if($currentPage !=  $lastPage ){
            $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $next);
            $link = str_replace('?&' , '?' , $link);
            $data->next = $link;
            if($currentPage == 1){
                $data->prev = "";
            }else{
                $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $prev);
                $link = str_replace('?&' , '?' , $link);
                $data->prev = $link ;
            }
        }else{
            $data->next = "";
            if($currentPage == 1){
                $data->prev = "";
            }else{
                $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $prev);
                $link = str_replace('?&' , '?' , $link);
                $data->prev = $link ;
            }
        }

        return $data;
    }

    static function getCountryNameByPhone($phone){
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $clinetNumberProto = $phoneUtil->parse($phone);
        $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();
        $langPref = LANGUAGE_PREF == 'en' ? 'en_US' : 'ar_EG';
        $country = $geocoder->getDescriptionForNumber($clinetNumberProto, $langPref);
        return $country;
    }

    static function checkRules($rule){
        if(IS_ADMIN == 1 && \Session::has('central') && \Session::get('central') == 1){
            return true;
        }
        $explodeRule = explode(',', $rule);
        // dd(PERMISSIONS);
        $containsSearch = count(array_intersect($explodeRule, (array) PERMISSIONS)) > 0;
        if($containsSearch == true){
            return true;
        }
        return false;
    }

    static function globalDelete($dataObj) {
         if ($dataObj == null) {
            return response()->json(\TraitsFunc::ErrorMessage(trans('main.notExist')));
        }

        $dataObj->deleted_by = USER_ID;
        $dataObj->deleted_at = date('Y-m-d H:i:s');
        $dataObj->save();

        $data['status'] = \TraitsFunc::SuccessResponse(trans('main.deleteSuccess'));
        return response()->json($data);
    }

    static function getCentralPermissions($withTitles = null){
        $data = [];
        $perms = config('central_permissions');
        foreach ($perms as $key => $perm) {
            if($perm != 'general'){
                $controller = explode('@', $key)[0];
                $data[$controller][$perm] = [
                    'perm_name' => $perm,
                    'perm_title' => trans('permission.'.$perm),
                ];
            }
        }
        return $data;
    }
    
    static function getAllPerms(){
        $controllers = config('permissions');
        $addons = Session::has('addons') ? Session::get('addons') : [];//\DB::connection('main')->table('addons')->whereIn('id',)->get(['module','id']);
        $externalPermissions = [];
        foreach ($addons as $addon) {
            if(!in_array($addon,Session::get('deactivatedAddons')) || !in_array($addon,Session::get('disabledAddons'))){
                if($addon == 1){
                    $externalPermissions = [
                        'BotControllers@index' => 'list-bots',
                        'BotControllers@edit' => 'edit-bot',
                        'BotControllers@update' => 'edit-bot',
                        'BotControllers@fastEdit' => 'edit-bot',
                        'BotControllers@changeStatus' => 'edit-bot',
                        'BotControllers@add' => 'add-bot',
                        'BotControllers@addBotReply' => 'add-bot',
                        'BotControllers@create' => 'add-bot',
                        'BotControllers@copy' => 'copy-bot',
                        'BotControllers@delete' => 'delete-bot',
                        'BotControllers@sort' => 'sort-bot',
                        'BotControllers@arrange' => 'sort-bot',
                        'BotControllers@charts' => 'charts-bot',
                        'BotControllers@uploadImage' => 'uploadImage-bot',
                        'BotControllers@deleteImage' => 'deleteImage-bot',
                        
                        'GroupNumbersControllers@index' => 'list-group-numbers',
                        'GroupNumbersControllers@edit' => 'edit-group-number',
                        'GroupNumbersControllers@update' => 'edit-group-number',
                        'GroupNumbersControllers@fastEdit' => 'edit-group-number',
                        'GroupNumbersControllers@add' => 'add-group-number',
                        'GroupNumbersControllers@create' => 'add-group-number',
                        'GroupNumbersControllers@delete' => 'delete-group-number',
                        'GroupNumbersControllers@sort' => 'sort-group-number',
                        'GroupNumbersControllers@arrange' => 'sort-group-number',
                        'GroupNumbersControllers@charts' => 'charts-group-number',
                        'GroupNumbersControllers@addGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@postAddGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@checkFile' =>'add-number-to-group',
                        'ApiModsControllers@report'  =>  'list-groupNumberReports',
                    ];
                }elseif($addon == 2){
                    $externalPermissions = [
                        'LiveChatControllers@index' => 'list-livechat',
                        'LiveChatControllers@dialogs' => 'list-dialogs',
                        'LiveChatControllers@pinChat' => 'pin-chat',
                        'LiveChatControllers@unpinChat' => 'unpin-chat',
                        'LiveChatControllers@readChat' => 'read-chat',
                        'LiveChatControllers@unreadChat' => 'unread-chat',
                        'LiveChatControllers@messages' => 'list-messages',
                        'LiveChatControllers@sendMessage' => 'sendMessage',
                        'LiveChatControllers@deleteMessage' => 'deleteMessage',
                        'LiveChatControllers@labels' => 'list-labels',
                        'LiveChatControllers@labelChat' => 'label-chat',
                        'LiveChatControllers@unlabelChat' => 'unlabel-chat',
                        'LiveChatControllers@contact' => 'list-contact-details',
                        'LiveChatControllers@updateContact' => 'update-contact-details',
                        'LiveChatControllers@quickReplies' => 'list-quickReplies',
                        'LiveChatControllers@moderators' => 'list-moderators',
                        'LiveChatControllers@assignMod' => 'assign-moderator',
                        'LiveChatControllers@removeMod' => 'remove-moderator',
                        'LiveChatControllers@liveChatLogout' => 'list-livechat',
                        
                        'GroupNumbersControllers@index' => 'list-group-numbers',
                        'GroupNumbersControllers@edit' => 'edit-group-number',
                        'GroupNumbersControllers@update' => 'edit-group-number',
                        'GroupNumbersControllers@fastEdit' => 'edit-group-number',
                        'GroupNumbersControllers@add' => 'add-group-number',
                        'GroupNumbersControllers@create' => 'add-group-number',
                        'GroupNumbersControllers@delete' => 'delete-group-number',
                        'GroupNumbersControllers@sort' => 'sort-group-number',
                        'GroupNumbersControllers@arrange' => 'sort-group-number',
                        'GroupNumbersControllers@charts' => 'charts-group-number',
                        'GroupNumbersControllers@addGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@postAddGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@checkFile' =>'add-number-to-group',
                        'ApiModsControllers@report'  =>  'list-groupNumberReports',
                    ];
                }elseif($addon == 3){
                    $externalPermissions = [
                        'GroupMsgsControllers@index' => 'list-group-messages',
                        'GroupMsgsControllers@add' => 'add-group-message' ,
                        'GroupMsgsControllers@create' => 'add-group-message',
                        'GroupMsgsControllers@resend' => 'add-group-message',
                        'GroupMsgsControllers@view' => 'view-group-message',
                        'GroupMsgsControllers@refresh' => 'view-group-message',
                        'GroupMsgsControllers@charts' => 'charts-group-message',
                        'GroupMsgsControllers@uploadImage' => 'uploadImage-group-message',
                        
                        'GroupNumbersControllers@index' => 'list-group-numbers',
                        'GroupNumbersControllers@edit' => 'edit-group-number',
                        'GroupNumbersControllers@update' => 'edit-group-number',
                        'GroupNumbersControllers@fastEdit' => 'edit-group-number',
                        'GroupNumbersControllers@add' => 'add-group-number',
                        'GroupNumbersControllers@create' => 'add-group-number',
                        'GroupNumbersControllers@delete' => 'delete-group-number',
                        'GroupNumbersControllers@sort' => 'sort-group-number',
                        'GroupNumbersControllers@arrange' => 'sort-group-number',
                        'GroupNumbersControllers@charts' => 'charts-group-number',
                        'GroupNumbersControllers@addGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@postAddGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@checkFile' =>'add-number-to-group',
                        'ApiModsControllers@report'  =>  'list-groupNumberReports',
                    ];
                }elseif($addon == 4){
                    $externalPermissions = [
                        'ZidControllers@customers' => 'zid-customers',
                        'ZidControllers@products' => 'zid-products',
                        'ZidControllers@orders' => 'zid-orders',
                        'ZidControllers@abandonedCarts' => 'zid-abandoned-carts',
                        'ZidControllers@getEvent' => 'zid-abandoned-carts',
                        'ZidControllers@updateEvent' => 'zid-abandoned-carts',
                        'ZidControllers@sendAbandoned' => 'zid-send-abandoned',
                        'ZidControllers@resendCarts' => 'zid-send-abandoned',
                        'ZidControllers@uploadImage' => 'zid-send-abandoned',
                        'ZidControllers@reports' => 'zid-reports',
                        'ZidControllers@templates' => 'zid-templates',
                        'ZidControllers@templatesEdit' => 'edit-zid-template',
                        'ZidControllers@templatesUpdate' => 'edit-zid-template',
                        'ZidControllers@templatesAdd' => 'add-zid-template',
                        'ZidControllers@templatesCreate' => 'add-zid-template',
                        'ZidControllers@settings' => 'updateZid',
                        'ZidControllers@postSettings' => 'updateZid',
                        // 'ZidControllers@templatesDelete' => 'delete-zid-template',
                        'ProfileControllers@updateZid' => 'updateZid',
                    ];
                }elseif($addon == 5){
                    $externalPermissions = [
                        'SallaControllers@customers' => 'salla-customers',
                        'SallaControllers@products' => 'salla-products',
                        'SallaControllers@abandonedCarts' => 'salla-abandoned-carts',
                        'SallaControllers@getEvent' => 'salla-abandoned-carts',
                        'SallaControllers@updateEvent' => 'salla-abandoned-carts',
                        'SallaControllers@sendAbandoned' => 'salla-send-abandoned',
                        'SallaControllers@resendCarts' => 'salla-send-abandoned',
                        'SallaControllers@uploadImage' => 'salla-send-abandoned',
                        'SallaControllers@orders' => 'salla-orders',
                        'SallaControllers@reports' => 'salla-reports',
                        'SallaControllers@templates' => 'salla-templates',
                        'SallaControllers@templatesEdit' => 'edit-salla-template',
                        'SallaControllers@templatesUpdate' => 'edit-salla-template',
                        'SallaControllers@templatesAdd' => 'add-salla-template',
                        'SallaControllers@templatesCreate' => 'add-salla-template',
                        // 'SallaControllers@templatesDelete' => 'delete-salla-template',
                        'ProfileControllers@updateSalla' => 'updateSalla',
                    ];
                }elseif($addon == 6){
                    $externalPermissions = [];
                }elseif($addon == 7){
                    $externalPermissions = [];
                }elseif($addon == 8){
                    $externalPermissions = [];
                }elseif($addon == 9){
                    $externalPermissions = [
                        'WhatsappOrdersControllers@settings' => 'whatsapp-settings',
                        'WhatsappOrdersControllers@postSettings' => 'whatsapp-settings',
                        'WhatsappOrdersControllers@bankTransfers' => 'whatsapp-bankTransfers',
                        'WhatsappOrdersControllers@viewTransfer' => 'view-whatsapp-bankTransfer',
                        'WhatsappOrdersControllers@updateTransfer' => 'edit-whatsapp-bankTransfer',
                        'WhatsappOrdersControllers@deleteTransfer' => 'delete-whatsapp-bankTransfer',

                        'WhatsappOrdersControllers@products' => 'whatsapp-products',
                        'WhatsappOrdersControllers@assignCategory' => 'whatsapp-assignCategory',
                        'WhatsappOrdersControllers@assignSallaProduct' => 'whatsapp-assignSallaProduct',
                        'WhatsappOrdersControllers@orders' => 'whatsapp-orders',
                        'WhatsappOrdersControllers@sendLink' => 'whatsapp-orders-sendLink',
                        'WhatsAppCouponControllers@index' => 'list-coupons',
                        'WhatsAppCouponControllers@edit' => 'edit-coupon',
                        'WhatsAppCouponControllers@update' => 'edit-coupon',
                        'WhatsAppCouponControllers@fastEdit' => 'edit-coupon',
                        'WhatsAppCouponControllers@add' => 'add-coupon',
                        'WhatsAppCouponControllers@create' => 'add-coupon',
                        'WhatsAppCouponControllers@delete' => 'delete-coupon',
                        'WhatsAppCouponControllers@arrange' => 'sort-coupon',
                        'WhatsAppCouponControllers@sort' => 'sort-coupon',
                        'WhatsAppCouponControllers@charts' => 'charts-coupon',
                    ];
                }elseif($addon == 10){
                    $externalPermissions = [
                        'BotPlusControllers@index' => 'list-bots-plus',
                        'BotPlusControllers@edit' => 'edit-bot-plus',
                        'BotPlusControllers@update' => 'edit-bot-plus',
                        'BotPlusControllers@changeStatus' => 'edit-bot-plus',
                        'BotPlusControllers@fastEdit' => 'edit-bot-plus',
                        'BotPlusControllers@add' => 'add-bot-plus',
                        'BotPlusControllers@create' => 'add-bot-plus',
                        'BotPlusControllers@copy' => 'copy-bot-plus',
                        'BotPlusControllers@delete' => 'delete-bot-plus',
                        'BotPlusControllers@sort' => 'sort-bot-plus',
                        'BotPlusControllers@arrange' => 'sort-bot-plus',
                        'BotPlusControllers@charts' => 'charts-bot-plus',
                        
                        'GroupNumbersControllers@index' => 'list-group-numbers',
                        'GroupNumbersControllers@edit' => 'edit-group-number',
                        'GroupNumbersControllers@update' => 'edit-group-number',
                        'GroupNumbersControllers@fastEdit' => 'edit-group-number',
                        'GroupNumbersControllers@add' => 'add-group-number',
                        'GroupNumbersControllers@create' => 'add-group-number',
                        'GroupNumbersControllers@delete' => 'delete-group-number',
                        'GroupNumbersControllers@sort' => 'sort-group-number',
                        'GroupNumbersControllers@arrange' => 'sort-group-number',
                        'GroupNumbersControllers@charts' => 'charts-group-number',
                        'GroupNumbersControllers@addGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@postAddGroupNumbers' =>'add-number-to-group',
                        'GroupNumbersControllers@checkFile' =>'add-number-to-group',
                        'ApiModsControllers@report'  =>  'list-groupNumberReports',
                    ];
                }elseif($addon == 11){
                    $externalPermissions = [
                        'ProfileControllers@apiSetting' => 'apiSetting',
                        'ProfileControllers@apiGuide' => 'apiGuide',
                        'ProfileControllers@webhookSetting' => 'webhookSetting',
                        'ProfileControllers@postWebhookSetting' => 'webhookSetting',
                    ];
                }
            }

            $controllers = array_merge($controllers,$externalPermissions);
        }
        return $controllers;
    }


    static function getPermissions($withTitles = null){
        $data = [];
        $perms = self::getAllPerms();
        foreach ($perms as $key => $perm) {
            if($perm != 'general'){
                $controller = explode('@', $key)[0];
                $data[$controller][$perm] = [
                    'perm_name' => $perm,
                    'perm_title' => trans('permission.'.$perm),
                ];
            }
        }
        return $data;
    }
    
    static function convert_number_to_words($number) {
        if(strpos($number, '.') !== false && substr($number, -1) == 0){
            $number = substr($number, 0, -1);
        }
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' and ';
        $dictionary  = array(

            "0.0"                   => 'zero',
            "0.01"                   => 'one',
            "0.02"                   => 'two',
            "0.03"                   => 'three',
            "0.04"                   => 'four',
            "0.05"                   => 'five',
            "0.06"                   => 'six',
            "0.07"                   => 'seven',
            "0.08"                   => 'eigh',
            "0.09"                   => 'nine',
            "0.1"                  => 'ten',
            "0.11"                  => 'eleven',
            "0.12"                   => 'twelve',
            "0.13"                  => 'thirteen',
            "0.14"                  => 'fourteen',
            "0.15"                  => 'fifteen',
            "0.16"                  => 'sixteen',
            "0.17"                 => 'seventeen',
            "0.18"                  => 'eighteen',
            "0.19"                  => 'nineteen',
            "0.2"                  => 'twenty',
            "0.3"                  => 'thirty',
            "0.4"                  => 'fourty',
            "0.5"                  => 'fifty',
            "0.6"                  => 'sixty',
            "0.7"                  => 'seventy',
            "0.8"                  => 'eighty',
            "0.9"                  => 'ninety',

            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . self::convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }


        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . self::convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= self::convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            $i=1;
            foreach (str_split((string) $fraction) as $number) {
                if($i==1)
                {
                   $f="0.";
                }else  if($i==2)
                {
                    $f="0.0";
                }
                $words[] = $dictionary[$f.$number];
                $i++;
            }
            $string .= implode(' ', $words);
            $string .=" Halalas";
        }

        return $string;
    }

    static function convert_number_to_wordsAR($number) {
        $hyphen      = '-';
        $conjunction = ' و ';
        $separator   = ', ';
        $negative    = 'سالب ';
        $decimal     = ' و ';
        $dictionary  = array(

            "0.0"                   => 'صفر',
            "0.01"                   => 'واحد',
            "0.02"                   => 'اثنان',
            "0.03"                   => 'ثلاثة',
            "0.04"                   => 'اربعة',
            "0.05"                   => 'خمسة',
            "0.06"                   => 'ستة',
            "0.07"                   => 'سبعة',
            "0.08"                   => 'ثمانية',
            "0.09"                   => 'تسعة',
            "0.1"                  => 'عشرة',
            "0.11"                  => 'احد عشر',
            "0.12"                   => 'اثنتا عشر',
            "0.13"                  => 'ثلاثة عشر',
            "0.14"                  => 'اربعة عشر',
            "0.15"                  => 'خمسة عشر',
            "0.16"                  => 'ستة عشر',
            "0.17"                 => 'سبعة عشر',
            "0.18"                  => 'ثمانية عشر',
            "0.19"                  => 'تسعة عشر',
            "0.2"                  => 'عشرون',
            "0.3"                  => 'ثلاثون',
            "0.4"                  => 'اربعون',
            "0.5"                  => 'خمسون',
            "0.6"                  => 'ستون',
            "0.7"                  => 'سبعون',
            "0.8"                  => 'ثمانون',
            "0.9"                  => 'تسعون',
            0                   => 'صفر',
            1                   => 'واحد',
            2                   => 'اثنان',
            3                   => 'ثلاثة',
            4                   => 'اربعة',
            5                   => 'خمسة',
            6                   => 'ستة',
            7                   => 'سبعة',
            8                   => 'ثمانية',
            9                   => 'تسعة',
            10                  => 'عشرة',
            11                  => 'احد عشر',
            12                  => 'اثنتا عشر',
            13                  => 'ثلاثة عشر',
            14                  => 'اربعة عشر',
            15                  => 'خمسة عشر',
            16                  => 'ستة عشر',
            17                  => 'سبعة عشر',
            18                  => 'ثمانية عشر',
            19                  => 'تسعة عشر',
            20                  => 'عشرون',
            30                  => 'ثلاثون',
            40                  => 'اربعون',
            50                  => 'خمسون',
            60                  => 'ستون',
            70                  => 'سبعون',
            80                  => 'ثمانون',
            90                  => 'تسعون',
            100                 => 'مائة',
            200                 => 'مائتان',
            300                 => 'ثلاثمائة',
            400                 => 'أربعمائة',
            500                 => 'خمسمائة',
            600                 => 'ستمائة',
            700                 => 'سبعمائة',
            800                 => 'ثمانمائة',
            900                 => 'تسعمائة',
            1000                => 'ألف',
            1000000             => 'مليون',
            1000000000          => 'بليون',
            1000000000000       => 'تريليون',
            1000000000000000    => 'كوادرليون',
            1000000000000000000 => 'كوانتليون',
            101010              => 'آلاف ',
            101011              => 'ريال سعودي',
            101012              => 'فقط'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {

            return $negative . self::convert_number_to_wordsAR(abs($number));

        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);

        }



        switch (true) {
            case $number < 21:

                $string = $dictionary[101012] .' '.$dictionary[$number].'  '. $dictionary[101011];

                break;
            case $number < 100:

                $tens   = ((int) ($number / 10)) * 10;

                $units  = $number % 10;
                if ($units) {
                    $string =$dictionary[101012] .' '. $dictionary[$units] . $conjunction  ;
                    $string .= $dictionary[$tens] .'  '. $dictionary[101011];
                }
                else
                {
                    $string =$dictionary[101012] .' '. $dictionary[$tens] .'  '. $dictionary[101011];
                }



                break;
            case $number < 1000:

                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $num = (int)$hundreds.'00';

                $string = $dictionary[101012] .' '. $dictionary[$num];

                if ($remainder) {
                    //Check Remainder update 26-9-2018
                    if($remainder < 21)
                    {
                        $string3 = $dictionary[$remainder];
                    }
                    else
                    {
                        $tens   = ((int) ($remainder / 10)) * 10;

                        $units  = $remainder % 10;
                        if ($units) {
                            $string3 =  $dictionary[$units] . $conjunction ;

                        }
                        $string3 .= $dictionary[$tens];
                    }


                    // End Update
                    $string .= $conjunction . $string3 .'  '. $dictionary[101011];
                }
                else
                {
                    $string .=  '  '. $dictionary[101011];
                }

                break;
            default:

                $baseUnit = pow(1000, floor(log($number, 1000)));

                $numBaseUnits = (int) ($number / $baseUnit);

                $remainder = $number % $baseUnit;

                if($numBaseUnits > 1)
                {
                    //Check Remainder update 26-9-2018
                    if($numBaseUnits < 21)
                    {
                        $string3 = $dictionary[$numBaseUnits];
                    }
                    else
                    {
                        $tens   = ((int) ($numBaseUnits / 10)) * 10;

                        $units  = $numBaseUnits % 10;
                        if ($units) {
                            $string3 =  $dictionary[$units] . $conjunction ;

                        }
                        $string3 .= $dictionary[$tens];
                    }


                    // End Update
                    if($numBaseUnits < 11)
                        $getthousand = $dictionary[101010];
                    else
                        $getthousand = $dictionary[1000];

                    $getfirstNum = $string3;

                }

                else
                {

                    $getthousand = $dictionary[$baseUnit];
                    $getfirstNum = '';
                }

                $string = $dictionary[101012].' '. $getfirstNum . ' ' . $getthousand ;
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $conjunction;

                    $hundreds  = $remainder / 100;
                    $remainder2 = $remainder % 100;
                    $num = (int)$hundreds.'00';



                    $string2 = $dictionary[$num];

                    if ($remainder2) {
                        //Check Remainder update 26-9-2018
                        if($remainder2 < 21)
                        {
                            $string3 = $dictionary[$remainder2];
                        }
                        else
                        {
                            $tens   = ((int) ($remainder2 / 10)) * 10;

                            $units  = $remainder2 % 10;
                            if ($units) {
                                $string3 =  $dictionary[$units] . $conjunction ;

                            }
                            $string3 .= $dictionary[$tens];
                        }


                        // End Update


                        $string2 .= $conjunction . $string3 .'  '. $dictionary[101011];
                    }
                    else
                    {
                        $string2 .=  '  '. $dictionary[101011];
                    }


                    $string .= $string2 ;


                }
                else
                {
                    $string .='  '. $dictionary[101011];
                }

                break;
        }




        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            $i=1;
            foreach (array_reverse(str_split((string) $fraction)) as $number) {

                if($i==1)
                {
                    $f="0.0";
                }else  if($i==2)
                {
                    $f="0.";
                }
                $words[] = $dictionary[$f.$number];
                $i++;
            }

            $string .= implode(' و', $words);
            $string .=" هللة";
        }

        return $string;
    }
}
