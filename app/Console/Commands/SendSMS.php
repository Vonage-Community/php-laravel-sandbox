<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Vonage\Client;
use Vonage\SMS\Message\SMS;

class SendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vonage:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test SMS';

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
     * @return int
     */
    public function handle(Client $client)
    {
        $text = new SMS('0123445', '123345', 'Hello from Vonage!');
        $response = $client->sms()->send($text);
        var_dump($response);
        return 0;
    }
}
