<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DbInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup application environment';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}
