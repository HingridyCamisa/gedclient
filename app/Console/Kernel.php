<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('expira:notification')
        ->weeklyOn(1, '9:00')
        ->runInBackground();

        $schedule->command('expira:avisoNotification')
        ->weeklyOn(1, '9:00')
        ->runInBackground();

        $schedule->command('expira:notification')
        ->weeklyOn(4, '12:00')
        ->runInBackground();

        $schedule->command('expira:avisoNotification')
        ->weeklyOn(4, '12:00')
        ->runInBackground();
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
