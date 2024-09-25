<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Google_Client;
use Google_Service_Gmail;
use Google_Service_Gmail_Message;

class VerifyEmailNotification extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        $client = new Google_Client();
        $client->setApplicationName('Your Application Name');
        $client->setScopes(Google_Service_Gmail::GMAIL_SEND);
        $client->setAuthConfig(storage_path('app/google-credentials.json')); // Pastikan file kredensial ada
        $client->setAccessType('offline');

        $service = new Google_Service_Gmail($client);

        $message = new Google_Service_Gmail_Message();
        $rawMessage = "From: " . config('services.google.email') . "\r\n";
        $rawMessage .= "To: " . $notifiable->email . "\r\n";
        $rawMessage .= "Subject: Verify Email Address\r\n\r\n";
        $rawMessage .= "Please click the button below to verify your email address:\r\n";
        $rawMessage .= $verificationUrl . "\r\n";

        $encodedMessage = rtrim(strtr(base64_encode($rawMessage), '+/', '-_'), '=');
        $message->setRaw($encodedMessage);

        try {
            $service->users_messages->send('me', $message);
        } catch (\Exception $e) {
            // Handle error
            \Log::error('Failed to send email: ' . $e->getMessage());
        }
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
