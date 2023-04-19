<?php

namespace App\Console;

use App\Models\Message;
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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     $mess = new Message();
        //     $mess->room_name = 13;
        //     $mess->content = "oke ae";
        //     $mess->user_id = 1;
        //     $mess->save();
        // })->everyFiveMinutes()->appendOutputTo(storage_path('logs/inspire.log'))->emailOutputTo('tntyesterday031093@gmail.com');
        // ->withoutOverlapping(30); do job space 30p
        $schedule->command('auto:sendMessage')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
