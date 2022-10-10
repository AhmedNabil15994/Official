<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SyncMessagesJob;
use App\Models\Device;
use Http;

class PullMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull Messages Every Minute';

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
        $devices= reset($devices);
        foreach($devices as $name){
            try {
                dispatch(new SyncMessagesJob([
                    'sessionId' => $name,
                ]))->onConnection('redis');
            } catch (Exception $e) {}
        }
        return 1;   
    }
}
