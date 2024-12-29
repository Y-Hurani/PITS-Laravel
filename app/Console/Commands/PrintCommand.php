<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class PrintCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:print-command {name=PITS}' ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Try printing, if fails, print the error
        try {
        $value = $this->argument('name');
        $this->info("Printing: $value");
        } catch(Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
