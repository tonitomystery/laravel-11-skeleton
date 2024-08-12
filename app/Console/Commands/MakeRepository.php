<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    protected $files;
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Create a new repository class';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->createRepository($name);
        $this->info("Repository $name created successfully.");
    }

    protected function createRepository($name)
    {
        $interfacePath = app_path("Contracts/{$name}RepositoryInterface.php");
        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        if ($this->files->exists($repositoryPath)) {
            $this->error("Repository $name already exists!");
            return;
        }

        // Generate the interface
        $interfaceStub = str_replace('{{interface}}', "{$name}RepositoryInterface", $this->getInterfaceStub());
        $this->files->put($interfacePath, $interfaceStub);

        // Generate the repository
        $repositoryStub = str_replace(['{{interface}}', '{{class}}', '{{model}}'], ["{$name}RepositoryInterface", "{$name}Repository", $name], $this->getRepositoryStub());
        $this->files->put($repositoryPath, $repositoryStub);
    }
    protected function getInterfaceStub()
    {
        return file_get_contents(base_path('stubs/toni/repository.interface.stub'));
    }

    protected function getRepositoryStub()
    {
        return file_get_contents(base_path('stubs/toni/repository.stub'));
    }
}
