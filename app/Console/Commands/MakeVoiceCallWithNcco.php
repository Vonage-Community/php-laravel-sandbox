<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Vonage\Client;
use Vonage\Voice\Endpoint\Phone;
use Vonage\Voice\NCCO\Action\Talk;
use Vonage\Voice\NCCO\NCCO;
use Vonage\Voice\OutboundCall;

class MakeVoiceCallWithNcco extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vonage:voice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a voice call with an NCCO object';

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
        $outboundCall = new OutboundCall(
            new Phone('14843331234'),
            new Phone('14843335555')
        );

        $ncco = new NCCO();
        $ncco->addAction(new Talk('This is a text to speech call from Vonage'));

        $outboundCall->setNCCO($ncco);

        $response = $client->voice()->createOutboundCall($outboundCall);
        Log::info(var_dump($response));
        return 0;
    }
}
