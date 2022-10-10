<?php

use Illuminate\Support\Facades\Http;
/**
 * This Class For Whatsloop Api To Send ( Message - File - Photo - Location - Voice - Contact )
 *
 * @author WhatsLoop.net
 */
class OfficialHelper {
    use \TraitsFunc;

    protected $from = "",$baseUrl = "";
    

    public function __construct($from) {
        define('VERSION', 'v13.0');
        $this->from = $from;
        $this->baseUrl = 'https://graph.facebook.com/'.VERSION.'/'.$this->from.'/';
    }

    /*----------------------------------------------------------
    Messages
    ----------------------------------------------------------*/

    public function sendMessage($data){
        $mainURL = $this->baseUrl.'messages';
        $result = Http::withToken(TOKEN)->contentType("application/json")->post($mainURL,$data);
        return $result;
    }
}