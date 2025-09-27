<?php

namespace App\Services;

use Twilio\Rest\Client;

class SendSMSservice
{
    public $client;
    public function __construct()
    {
        $sid   = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN'); // <-- correct key

        if (!$sid || !$token) {
            throw new \Exception("Twilio SID or Auth Token is missing in .env");
        }

        $this->client = new Client($sid, $token);
    }

    public function send($to, $message)
    {
        return  $this->client->messages->create($to, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]);
    }
}
