<?php

namespace App\Console;

use App\Console\Commands\DbInstallCommand;
use App\Console\Commands\JsonProductsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        DbInstallCommand::class,
        JsonProductsCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('import:json')->timezone('Asia/Riyadh')
        //     ->daily(); // 12AM
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
