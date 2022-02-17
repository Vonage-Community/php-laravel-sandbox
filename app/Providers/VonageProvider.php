<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Vonage\Client;

class VonageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Client::class, function() {
            $basic = new Client\Credentials\Basic(config('vonage.apiKey'), config('vonage.apiSecret'));
            $keypair = new Client\Credentials\Keypair(
                file_get_contents(base_path() . '/' . config('vonage.apiKeyPath')),
                config('vonage.applicationId')
            );

            return new Client(new Client\Credentials\Container($basic, $keypair));
        });
    }
}
