<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $code;

    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code = $code;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('verification.' . $this->email);
    }

    public function broadcastAs()
    {
        return 'verification.code';
    }
}
