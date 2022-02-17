<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;

class IncomingCallController extends Controller
{
    public function __invoke(Request $request, Client $client)
    {
        $ncco = [
            [
                'action' => 'talk',
                'text' => 'Thank you for calling Vonage!'
            ]
        ];

        return response()->json($ncco);
    }
}
