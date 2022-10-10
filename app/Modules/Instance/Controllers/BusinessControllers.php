<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\DeviceSetting;
use App\Models\Channel;
use App\Models\Dialog;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

class BusinessControllers extends Controller {

    use \TraitsFunc;

    public function formatResponse($message,$type){
        if($type == 'session exists'){
            $message = str_replace('Session','Channel Name',$message);
            $message = str_replace('id','Channel Name',$message);
        }
        return $message;
    }

    /**
     * @OA\Post(
     *     path="/business/getBusinessProfile",
     *     tags={"Whatsapp Business"},
     *     operationId="getBusinessProfile",
     *     summary="fetch user business profile",
     *     description="fetch connected user business profile data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns profile object."),
     *     @OA\Parameter(description="Phone to get business profile",in="query",name="phone", required=true),
     * )
     */
    public function getBusinessProfile(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phone']) || empty($input['phone'])){
            return \TraitsFunc::ErrorMessage("Phone field is required !!");
        }
      
        $response = Http::post(env('URL_WA_SERVER').'/business/userBusinessProfile?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);     
    }

    /**
     * @OA\Post(
     *     path="/business/products",
     *     tags={"Whatsapp Business"},
     *     operationId="products",
     *     summary="fetch user business products",
     *     description="fetch connected user business products data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Product Id to get specific product",in="query",name="productId", required=false),
     *     @OA\Parameter(description="Phone to get products for specific user",in="query",name="phone", required=false),
     * )
     */
    public function products(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
        
        if(isset($input['productId']) && !empty($input['productId'])){
            $response = Http::post(env('URL_WA_SERVER').'/business/getProduct?id='.$name,$input);
        }else{
            $response = Http::post(env('URL_WA_SERVER').'/business/getProducts?id='.$name,$input);
        }

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $messages = [];
        if(isset($res->success) && $res->success){
            if(is_array($res->data)){
                foreach($res->data as $oneMessage){
                    if(isset($oneMessage->id)){
                        $messages[] = \Helper::formatArrayShape((array)$oneMessage);
                    }
                }
            }else{
                if(isset($res->data->id)){
                    $messages[] = \Helper::formatArrayShape((array)$res->data);
                }
            }

            $data['data'] = $messages;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/business/products/create",
     *     tags={"Whatsapp Business"},
     *     operationId="createProduct",
     *     summary="create user business new product",
     *     description="create connected user business new product",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Product Name",in="query",name="name", required=true),
     *     @OA\Parameter(description="Product Description",in="query",name="description", required=true),
     *     @OA\Parameter(description="Product Price",in="query",name="price", required=true),
     *     @OA\Parameter(description="Product Currency",in="query",name="currency", required=true),
     *     @OA\Parameter(description="Product Image URL",in="query",name="image", required=true),
     *     @OA\Parameter(description="Product View Status (true | false)",in="query",name="isHidden", required=false),
     * )
     */
    public function createProduct(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['name']) && !empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Product Name field is required !!");
        }

        if(!isset($input['description']) && !empty($input['description'])){
            return \TraitsFunc::ErrorMessage("Product Description field is required !!");
        }

        if(!isset($input['price']) && !empty($input['price'])){
            return \TraitsFunc::ErrorMessage("Product Price field is required !!");
        }

        if(!isset($input['currency']) && !empty($input['currency'])){
            return \TraitsFunc::ErrorMessage("Product Currency field is required !!");
        }

        if(!isset($input['image']) && !empty($input['image'])){
            return \TraitsFunc::ErrorMessage("Product Image URL field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/createProduct?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/products/update",
     *     tags={"Whatsapp Business"},
     *     operationId="updateProduct",
     *     summary="update user business product",
     *     description="update connected user business product",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Product ID",in="query",name="productId", required=true),
     *     @OA\Parameter(description="Product Name",in="query",name="name", required=false),
     *     @OA\Parameter(description="Product Description",in="query",name="description", required=false),
     *     @OA\Parameter(description="Product Price",in="query",name="price", required=false),
     *     @OA\Parameter(description="Product Currency",in="query",name="currency", required=false),
     *     @OA\Parameter(description="Product Image URL",in="query",name="image", required=false),
     *     @OA\Parameter(description="Product View Status (true | false)",in="query",name="isHidden", required=false),
     * )
     */
    public function updateProduct(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['productId']) && !empty($input['productId'])){
            return \TraitsFunc::ErrorMessage("Product ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/updateProduct?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/products/delete",
     *     tags={"Whatsapp Business"},
     *     operationId="deleteProduct",
     *     summary="delete user business product",
     *     description="delete connected user business product",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Product ID",in="query",name="productId", required=true),
     * )
     */
    public function deleteProduct(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['productId']) && !empty($input['productId'])){
            return \TraitsFunc::ErrorMessage("Product ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/deleteProducts?id='.$name,[
            'productIds' => [$input['productId']]
        ]);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/sendProduct",
     *     tags={"Whatsapp Business"},
     *     operationId="sendProduct",
     *     summary="send user business product",
     *     description="send connected user business product to specific phone",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Product ID",in="query",name="productId", required=true),
     *     @OA\Parameter(description="Phone to send business product",in="query",name="phone", required=true),
     * )
     */
    public function sendProduct(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['productId']) && !empty($input['productId'])){
            return \TraitsFunc::ErrorMessage("Product ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/sendProduct?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/getOrder",
     *     tags={"Whatsapp Business"},
     *     operationId="getOrder",
     *     summary="get order",
     *     description="get user specific order",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Order ID",in="query",name="id", required=true),
     *     @OA\Parameter(description="Order Token",in="query",name="token", required=true),
     * )
     */
    public function getOrder(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['id']) || empty($input['id']))){
            return \TraitsFunc::ErrorMessage("Order ID field is required !!");
        }

        if(!isset($input['token']) && !empty($input['token'])){
            return \TraitsFunc::ErrorMessage("Order Token field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/getOrder?id='.$name,[
            'orderId' => $input['id'],
            'orderToken' => $input['token'],
        ]);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/collections",
     *     tags={"Whatsapp Business"},
     *     operationId="collections",
     *     summary="get order",
     *     description="get user specific order",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to get collections for specific user",in="query",name="phone", required=false),
     * )
     */
    public function collections(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        $response = Http::post(env('URL_WA_SERVER').'/business/getCollections?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/sendCatalog",
     *     tags={"Whatsapp Business"},
     *     operationId="sendCatalog",
     *     summary="send user business product",
     *     description="send connected user business product to specific phone",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Phone to send business product",in="query",name="phone", required=true),
     * )
     */
    public function sendCatalog(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/sendCatalog?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Get(
     *     path="/business/labels",
     *     tags={"Whatsapp Business"},
     *     operationId="labels",
     *     summary="fetch user business labels",
     *     description="fetch connected user business labels data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     * )
     */
    public function labels(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
            
        $response = Http::post(env('URL_WA_SERVER').'/business/labels?id='.$name,$input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/business/labelChat",
     *     tags={"Whatsapp Business"},
     *     operationId="labelChat",
     *     summary="label chat",
     *     description="label specific phone",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     *     @OA\Parameter(description="Phone to label",in="query",name="phone", required=true),
     * )
     */
    public function labelChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['labelId']) && !empty($input['labelId'])){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/labelChat?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/unlabelChat",
     *     tags={"Whatsapp Business"},
     *     operationId="unlabelChat",
     *     summary="unlabel chat",
     *     description="unlabel specific phone",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     *     @OA\Parameter(description="Phone to unlabel",in="query",name="phone", required=true),
     * )
     */
    public function unlabelChat(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['phone']) || empty($input['phone']))){
            return \TraitsFunc::ErrorMessage("Receiver Phone field is required !!");
        }

        if(!isset($input['labelId']) && !empty($input['labelId'])){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/unlabelChat?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/labelMessage",
     *     tags={"Whatsapp Business"},
     *     operationId="labelMessage",
     *     summary="label message",
     *     description="label specific message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     *     @OA\Parameter(description="Message ID to label",in="query",name="messageId", required=true),
     * )
     */
    public function labelMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['messageId']) || empty($input['messageId']))){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }

        if(!isset($input['labelId']) && !empty($input['labelId'])){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/labelMessage?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/unlabelMessage",
     *     tags={"Whatsapp Business"},
     *     operationId="unlabelMessage",
     *     summary="unlabel message",
     *     description="unlabel specific message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     *     @OA\Parameter(description="Message ID to label",in="query",name="messageId", required=true),
     * )
     */
    public function unlabelMessage(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['messageId']) || empty($input['messageId']))){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }

        if(!isset($input['labelId']) && !empty($input['labelId'])){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/unlabelMessage?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/labels/create",
     *     tags={"Whatsapp Business"},
     *     operationId="createLabel",
     *     summary="create label",
     *     description="create label",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label Name",in="query",name="name", required=true),
     *     @OA\Parameter(description="Label Color ID",in="query",name="color", required=true),
     * )
     */
    public function createLabel(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['name']) || empty($input['name']))){
            return \TraitsFunc::ErrorMessage("Name field is required !!");
        }

        if(!isset($input['color']) && !empty($input['color'])){
            return \TraitsFunc::ErrorMessage("Label Color ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/createLabel?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/labels/update",
     *     tags={"Whatsapp Business"},
     *     operationId="updateLabel",
     *     summary="update label",
     *     description="update label",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     *     @OA\Parameter(description="Label Name",in="query",name="name", required=false),
     *     @OA\Parameter(description="Label Color ID",in="query",name="color", required=false),
     * )
     */
    public function updateLabel(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['labelId']) || empty($input['labelId']))){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/updateLabel?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/labels/delete",
     *     tags={"Whatsapp Business"},
     *     operationId="deleteLabel",
     *     summary="delete label",
     *     description="delete label",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Label ID",in="query",name="labelId", required=true),
     * )
     */
    public function deleteLabel(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['labelId']) || empty($input['labelId']))){
            return \TraitsFunc::ErrorMessage("Label ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/deleteLabel?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Get(
     *     path="/business/replies",
     *     tags={"Whatsapp Business"},
     *     operationId="replies",
     *     summary="fetch user business replies",
     *     description="fetch connected user business replies data",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     * )
     */
    public function replies(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }
            
        $response = Http::post(env('URL_WA_SERVER').'/business/quickReplies?id='.$name,$input);
        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);        
    }

    /**
     * @OA\Post(
     *     path="/business/replies/create",
     *     tags={"Whatsapp Business"},
     *     operationId="createReply",
     *     summary="create quick reply",
     *     description="create quick reply",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Quick Reply Shortcut",in="query",name="shortcut", required=true),
     *     @OA\Parameter(description="Quick Reply Message",in="query",name="message", required=true),
     * )
     */
    public function createReply(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['shortcut']) || empty($input['shortcut']))){
            return \TraitsFunc::ErrorMessage("Quick Reply shortcut field is required !!");
        }

        if(!isset($input['message']) && !empty($input['message'])){
            return \TraitsFunc::ErrorMessage("Quick Reply message field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/createQuickReply?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/replies/update",
     *     tags={"Whatsapp Business"},
     *     operationId="updateReply",
     *     summary="update quick reply",
     *     description="update quick reply",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Quick Reply ID",in="query",name="reply_id", required=true),
     *     @OA\Parameter(description="Quick Reply Shortcut",in="query",name="shortcut", required=false),
     *     @OA\Parameter(description="Quick Reply Message",in="query",name="message", required=false),
     * )
     */
    public function updateReply(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['reply_id']) || empty($input['reply_id']))){
            return \TraitsFunc::ErrorMessage("Quick Reply ID field is required !!");
        }

        if((!isset($input['shortcut']) || empty($input['shortcut']))){
            return \TraitsFunc::ErrorMessage("Quick Reply shortcut field is required !!");
        }

        if(!isset($input['message']) && !empty($input['message'])){
            return \TraitsFunc::ErrorMessage("Quick Reply message field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/updateQuickReply?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }

    /**
     * @OA\Post(
     *     path="/business/replies/delete",
     *     tags={"Whatsapp Business"},
     *     operationId="deleteReply",
     *     summary="delete quick reply",
     *     description="delete quick reply",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description=""),
     *     @OA\Parameter(description="Quick Reply ID",in="query",name="reply_id", required=true),
     * )
     */
    public function deleteReply(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if((!isset($input['reply_id']) || empty($input['reply_id']))){
            return \TraitsFunc::ErrorMessage("Quick Reply ID field is required !!");
        }
        
        $response = Http::post(env('URL_WA_SERVER').'/business/deleteQuickReply?id='.$name,$input);

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse();
        return \Response::json((object) $data);   
    }
}
