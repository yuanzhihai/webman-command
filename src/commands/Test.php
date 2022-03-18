<?php

namespace yzh52521\command\commands;

use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature = 'test';
    protected $description = 'run unit test';

    public function handle()
    {
        $this->info("test!");
    }
}
