<?php

namespace OnCloud\Dinero\Commands;

use Illuminate\Console\Command;

class DineroCommand extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
