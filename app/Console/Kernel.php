<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        //
        \App\Console\Commands\PullMessages::class,
        \App\Console\Commands\PullDialogs::class,

    ];
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('pull:messages')->everyMinute()->withoutOverlapping();
        // $schedule->command('pull:dialogs')->everyMinute()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // $schedule->command('set:addonReports',[1])->everyMinute();


        require base_path('routes/console.php');
    }
}
