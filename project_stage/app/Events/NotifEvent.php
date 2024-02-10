<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifEvent implements ShouldBroadcastNow
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */

    private $notif;

    public function __construct($notif)
    {
        $this->notif = $notif;
    }

    public function broadcastWith()
    {
        return ['message' => $this->notif];
    }

    public function broadcastOn()
    {
        return new Channel('public');
    }
}
