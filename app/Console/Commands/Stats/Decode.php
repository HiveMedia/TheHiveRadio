<?php namespace App\Console\Commands\Stats;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Decode extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'stats:decode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'I process the logs to get the country/ISP of the connected users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        //
        $this->info('test');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            //['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

}
