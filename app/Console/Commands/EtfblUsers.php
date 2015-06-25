<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class EtfblUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'etfbl:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info(json_encode(User::all(), JSON_PRETTY_PRINT));
    }
}
