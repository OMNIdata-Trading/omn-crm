<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrationsAndSeedersModulesRobot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'robot:migrate-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migritions and seeders from modules';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh', [
            '--force' => 'force',
        ]);

        // $this->call('module:migrate', [
        //     'module' => '',
        // ]);
    }
}
