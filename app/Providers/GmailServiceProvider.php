<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google_Client;
use Google_Service_Gmail;

class GmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Google_Client::class, function ($app) {
            $client = new Google_Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->setRefreshToken(config('services.google.refresh_token'));
            $client->setAccessType('offline');
            $client->setScopes([Google_Service_Gmail::GMAIL_SEND]);
            
            return $client;
        });

        $this->app->singleton(Google_Service_Gmail::class, function ($app) {
            $client = $app->make(Google_Client::class);
            return new Google_Service_Gmail($client);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
