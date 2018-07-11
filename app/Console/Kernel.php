<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\FetchReviews;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\FetchReviews'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('fetch:reviews')
        // ->everyThirtyMinutes()
        // ->runInBackground()
        // ->withoutOverlapping()
        // ->sendOutputTo(storage_path('logs/commands/job_scheduler.log'), true);

        // $schedule->job(new FetchReviews)->everyThirtyMinutes()->sendOutputTo(storage_path('logs/queue/job_scheduler.log'), true);
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
