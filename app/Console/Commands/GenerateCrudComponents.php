<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateCrudComponents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera crud y documentacion para un modelo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->call('make:model', ['name' => $name, '-a' => true, '-m' => true, '--api' => true]);
        $this->call('make:resource', ['name' => $name . 'Resource']);

        // generta file repository
        $this->call('make:repository', ['name' => $name]);



        //
    }
}
