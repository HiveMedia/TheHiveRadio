<?php namespace App\Console\Commands\Stats;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Capture extends Command {

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
        $curl = curl_init();
        $url = "http://". env('ICECAST_USER').':' . env('ICECAST_PASS') . '@' . env('ICECAST_HOST') . ':' . env('ICECAST_PORT') .
            '/admin';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2) Icebreath/Icecast (Firefox cURL emulated)');

        $data = curl_exec($curl);
        $http_resp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if(empty($data) || $http_resp != "200")
            throw new \RuntimeException("Failed to connect to the requested server ***MASKED***, got HTTP response code [$http_resp]");

        return curl_exec($curl);
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
