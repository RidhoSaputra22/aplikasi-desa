<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateComposer extends Command
{
    protected $signature = 'composer:update';
    protected $description = 'Runs composer update for the project.';

    public function handle()
    {
        $path = base_path();
        $command = 'composer update';

        // Execute the command in the project root
        exec("cd {$path} && {$command}", $output, $returnCode);

        if ($returnCode === 0) {
            $this->info('Composer update completed successfully.');
        } else {
            $this->error('Composer update failed.');
            $this->error(implode("\n", $output));
        }
    }
}
