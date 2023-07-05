<?php

namespace App\Console\Commands;

use App\Http\Controllers\JsonProductsController;
use Illuminate\Console\Command;

class JsonProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import JSON products from external URL into EAV tables into database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        (new JsonProductsController)->get();
    }
}
