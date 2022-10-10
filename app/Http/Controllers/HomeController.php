<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use Session;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller {

	use \TraitsFunc;


	public function sendMessage(){
		$input = \Request::all();
		if(!isset($input['service']) || empty($input['service'])){
			return \TraitsFunc::ErrorMessage('Service Field is required !!!');
		}
		if(!isset($input['type']) || empty($input['type'])){
			return \TraitsFunc::ErrorMessage('Type Field is required !!!');
		}
		if(!isset($input['to']) || empty($input['to'])){
			return \TraitsFunc::ErrorMessage('Phone Field is required !!!');
		}
		if(!isset($input['from']) || empty($input['from'])){
			return \TraitsFunc::ErrorMessage('From Field is required !!!');
		}
		if(!isset($input['message']) || empty($input['message'])){
			return \TraitsFunc::ErrorMessage('Message Field is required !!!');
		}

		$data = [
			'messaging_product' => $input['service'],
			'preview_url' => false,
			'recipient_type' => 'individual',
			'to' => $input['to'],
			'type' => $input['type'],
			'text' =>[
				'body' => $input['message'],
			],
		];

		$officialObj = new \OfficialHelper($input['from']);
		$result = $officialObj->sendMessage($data);

		$dataList['data'] = $result->json();
		$dataList['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $dataList);  
	}

	public function sendButtons(){
		$input = \Request::all();

		if(!isset($input['service']) || empty($input['service'])){
			return \TraitsFunc::ErrorMessage('Service Field is required !!!');
		}
		if(!isset($input['type']) || empty($input['type'])){
			return \TraitsFunc::ErrorMessage('Type Field is required !!!');
		}
		if(!isset($input['to']) || empty($input['to'])){
			return \TraitsFunc::ErrorMessage('Phone Field is required !!!');
		}
		if(!isset($input['from']) || empty($input['from'])){
			return \TraitsFunc::ErrorMessage('From Field is required !!!');
		}
		if(!isset($input['body']) || empty($input['body'])){
			return \TraitsFunc::ErrorMessage('Body Field is required !!!');
		}
		if(!isset($input['buttons']) || empty($input['buttons'])){
			return \TraitsFunc::ErrorMessage('Buttons Data is required !!!');
		}

		$defButtonsData = [];
		foreach ($input['buttons'] as $key => $value) {
			$defButtonsData[] = [
				'type' => 'reply',
				'reply' => $value,
			];
		}

		$data = [
			'messaging_product' => $input['service'],
			'recipient_type' => 'individual',
			'to' => $input['to'],
			'type' => $input['type'],
			$input['type'] => [
				'type' => 'button',
				'body' => [
					'text' => $input['body'],
				],
				'action' =>[
					'buttons' => $defButtonsData,
				],
			],
		];

		$officialObj = new \OfficialHelper($input['from']);
		$result = $officialObj->sendMessage($data);
		dd($result->json());
	}

	public function sendPreview(){
		$input = \Request::all();

		if(!isset($input['service']) || empty($input['service'])){
			return \TraitsFunc::ErrorMessage('Service Field is required !!!');
		}
		if(!isset($input['to']) || empty($input['to'])){
			return \TraitsFunc::ErrorMessage('Phone Field is required !!!');
		}
		if(!isset($input['from']) || empty($input['from'])){
			return \TraitsFunc::ErrorMessage('From Field is required !!!');
		}
		if(!isset($input['message']) || empty($input['message'])){
			return \TraitsFunc::ErrorMessage('Message Field is required !!!');
		}

		$data = [
			'messaging_product' => $input['service'],
			'to' => $input['to'],
			'text' => [
				'preview_url' => true,
				'body' => $input['message'],
			],
		];

		$officialObj = new \OfficialHelper($input['from']);
		$result = $officialObj->sendMessage($data);
		dd($result->json());
	}
}
