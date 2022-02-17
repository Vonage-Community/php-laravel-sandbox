<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Vonage\SMS\Webhook\Factory;

class IncomingSmsController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info('Hit the SMS inbound endpoint');
        $sms = Factory::createFromGlobals($request);
        Log::info(var_dump($sms));
    }
}
