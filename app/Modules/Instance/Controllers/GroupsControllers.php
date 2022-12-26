<?php namespace App\Http\Controllers;

use Request;
use Response;
use URL;
use DB;
use App\Models\Device;
use App\Models\DeviceSetting;
use App\Models\Channel;
use App\Models\Message;
use App\Models\Dialog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class GroupsControllers extends Controller {

    use \TraitsFunc;

    public function formatResponse($message,$type){
        if($type == 'session exists'){
            $message = str_replace('Session','Channel Name',$message);
            $message = str_replace('id','Channel Name',$message);
        }
        return $message;
    }

    /**
     * @OA\Get(
     *     path="/groups",
     *     tags={"Groups"},
     *     operationId="groups",
     *     summary="fetch all groups",
     *     description="fetch user all groups",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200", description="returns array of groups."),
     *     @OA\Parameter(description="Group Id to get specific group",in="query",name="groupId", required=false),
     * )
     */
    public function fetchGroups(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(isset($input['groupId']) && !empty($input['groupId'])){
            $response = Http::post(env('URL_WA_SERVER').'/groups/getGroupByID?id='.$name,$input);
        }else{
            $response = Http::get(env('URL_WA_SERVER').'/groups?id='.$name);
        }

        $res = json_decode($response->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }

        $dialogs = [];
        if(isset($res->success) && $res->success){
            $res->data = (array) $res->data;
            if(is_array($res->data)){
                foreach($res->data as $oneMessage){
                    $dialogs[] = (array)$oneMessage;
                }
            }

            $data['data'] = $dialogs;
            $data['status'] = \TraitsFunc::SuccessResponse();
            return \Response::json((object) $data);        
        }else{
            return \TraitsFunc::ErrorMessage($res->message);
        }
    }

    /**
     * @OA\Post(
     *     path="/groups/createGroup",
     *     tags={"Groups"},
     *     operationId="createGroup",
     *     summary="create group",
     *     description="create new group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Name to be created",in="query",name="name", required=true),
     *     @OA\Parameter(description="Phones (Group Participants) to be created",in="query",name="phones", required=true),
     * )
     */
    public function createGroup(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['name']) || empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Group Name field is required !!");
        }

        if(!isset($input['phones']) || empty($input['phones'])){
            return \TraitsFunc::ErrorMessage("Group Participants field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/create?id='.$name, [
            'subject' => $input['name'],
            'phones' => $input['phones'],
        ]);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Created Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/renameGroup",
     *     tags={"Groups"},
     *     operationId="renameGroup",
     *     summary="rename group",
     *     description="rename specific group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Name to be updated",in="query",name="name", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function renameGroup(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['name']) || empty($input['name'])){
            return \TraitsFunc::ErrorMessage("Group Name field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/updateGroupName?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/updateDescription",
     *     tags={"Groups"},
     *     operationId="updateDescription",
     *     summary="update group description",
     *     description="update specific group description",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Description to be updated",in="query",name="description", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function updateDescription(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['description']) || empty($input['description'])){
            return \TraitsFunc::ErrorMessage("Group Description field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/updateGroupDescription?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/updateSetting",
     *     tags={"Groups"},
     *     operationId="updateSetting",
     *     summary="update group settings",
     *     description="update specific group settings",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Setting to be updated ('announcement' | 'not_announcement' | 'locked' | 'unlocked')",in="query",name="setting", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function updateSetting(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['setting']) || empty($input['setting'])){
            return \TraitsFunc::ErrorMessage("Group Setting field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/updateGroupSettings?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/getParticipants",
     *     tags={"Groups"},
     *     operationId="getParticipants",
     *     summary="get group participants",
     *     description="get specific group participants",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Id to get specific group participants",in="query",name="groupId", required=true),
     * )
     */
    public function getParticipants(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/getGroupParticipants?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Participants generated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/addParticipants",
     *     tags={"Groups"},
     *     operationId="addParticipants",
     *     summary="add group participants",
     *     description="add participants to specific group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group participants phones to be updated",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function addParticipants(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phones']) || empty($input['phones'])){
            return \TraitsFunc::ErrorMessage("Group Participants phones field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/addGroupParticipant?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Participants Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/removeParticipants",
     *     tags={"Groups"},
     *     operationId="removeParticipants",
     *     summary="remove group participants",
     *     description="remove participants to specific group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group participants phones to be updated",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function removeParticipants(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phones']) || empty($input['phones'])){
            return \TraitsFunc::ErrorMessage("Group Participants phones field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/removeGroupParticipant?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Participants Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/promoteParticipants",
     *     tags={"Groups"},
     *     operationId="promoteParticipants",
     *     summary="promote group participants",
     *     description="promote participants to specific group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group participants phones to be promoted",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function promoteParticipants(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phones']) || empty($input['phones'])){
            return \TraitsFunc::ErrorMessage("Group Participants phones field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/promoteGroupParticipant?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Participants Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/demoteParticipants",
     *     tags={"Groups"},
     *     operationId="demoteParticipants",
     *     summary="demote group participants",
     *     description="demote participants to specific group",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group participants phones to be demoted",in="query",name="phones", required=true),
     *     @OA\Parameter(description="Group Id to update specific group",in="query",name="groupId", required=true),
     * )
     */
    public function demoteParticipants(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['phones']) || empty($input['phones'])){
            return \TraitsFunc::ErrorMessage("Group Participants phones field is required !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/demoteGroupParticipant?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group Participants Updated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/joinGroup",
     *     tags={"Groups"},
     *     operationId="joinGroup",
     *     summary="join group by code",
     *     description="join specific group by code",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group code to join group",in="query",name="code", required=true),
     * )
     */
    public function joinGroup(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['code']) || empty($input['code'])){
            return \TraitsFunc::ErrorMessage("Group Code field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/joinGroup?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("You have been joined group Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/leaveGroup",
     *     tags={"Groups"},
     *     operationId="leaveGroup",
     *     summary="leave group",
     *     description="leave specific group by id",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Id to leave group",in="query",name="groupId", required=true),
     * )
     */
    public function leaveGroup(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/leaveGroup?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("You have been left group Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/getInviteCode",
     *     tags={"Groups"},
     *     operationId="getInviteCode",
     *     summary="get group invite code",
     *     description="get specific group invite code",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group Id to get invite code",in="query",name="groupId", required=true),
     * )
     */
    public function getInviteCode(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group ID field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/inviteCode?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group data generated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/getInviteInfo",
     *     tags={"Groups"},
     *     operationId="getInviteInfo",
     *     summary="get group invite info",
     *     description="get specific group invite info",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group code to join group",in="query",name="code", required=true),
     * )
     */
    public function getInviteInfo(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['code']) || empty($input['code'])){
            return \TraitsFunc::ErrorMessage("Group Code field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/getGroupInviteInfo?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group data generated Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/acceptInvite",
     *     tags={"Groups"},
     *     operationId="acceptInvite",
     *     summary="accept group invite ",
     *     description="accept group invitation message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Message ID of group invitation message",in="query",name="messageId", required=true),
     * )
     */
    public function acceptInvite(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['messageId']) || empty($input['messageId'])){
            return \TraitsFunc::ErrorMessage("Message ID field is required !!");
        }
        $input['messageId'] = explode('.us_',$input['messageId'])[1];

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/acceptGroupInvite?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group invitation has been accepted Successfully !!!");
        return \Response::json((object) $data);         
    }

    /**
     * @OA\Post(
     *     path="/groups/revokeInvite",
     *     tags={"Groups"},
     *     operationId="revokeInvite",
     *     summary="revoke group invite ",
     *     description="revoke group invitation message",
     *     security={ {"bearer_token": {} , "channel_id": {} , "channel_token": {} }},
     *     @OA\Response(response="200",description=""),
     *     @OA\Parameter(description="Group ID to revoke invitation",in="query",name="groupId", required=true),
     * )
     */
    public function revokeInvite(){
        $input = Request::all();
        $name = NAME;
        $deviceObj = Device::NotDeleted()->where('name', $name)->first();
        if(!$deviceObj){
            return \TraitsFunc::ErrorMessage("Channel isn't Found !!");
        }

        if(!isset($input['groupId']) || empty($input['groupId'])){
            return \TraitsFunc::ErrorMessage("Group Id field is required !!");
        }

        $forwardResponse = Http::post(env('URL_WA_SERVER').'/groups/revokeGroupInvite?id='.$name, $input);
        $res = json_decode($forwardResponse->getBody());
        if(!$res->success){
            return \TraitsFunc::ErrorMessage("System Error, Contact Your System Adminstrator !!");
        }
        $data['data'] = $res->data;
        $data['status'] = \TraitsFunc::SuccessResponse("Group invitation has been accepted Successfully !!!");
        return \Response::json((object) $data);         
    }
}
