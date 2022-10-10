<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SyncDialogsJob;
use App\Models\Device;
use App\Models\DeviceSetting;
use Http;

class PullDialogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:dialogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull Dialogs Every Minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $devices = Device::where('id','!=',4)->pluck('name');
        $devs = DeviceSetting::get();
        foreach($devs as $device){
            $oldData = (array)json_decode($device->webhooks);
            $oldData['messageNotifications'] = $oldData['messagesNotifications'];
            unset($oldData['messagesNotifications']);
            $device->webhooks = json_encode($oldData);
            $device->save();
        }
        // $devices= reset($devices);
        // foreach($devices as $name){
        //     try {
        //         dispatch(new SyncDialogsJob([
        //             'sessionId' => $name,
        //         ]))->onConnection('redis');
        //     } catch (Exception $e) {}
        // }
        return 1;   
    }
}
