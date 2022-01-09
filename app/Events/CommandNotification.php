<?php

namespace App\Events;

use App\Models\Pizza;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommandNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Pizza
     */
    public $pizza;

    /**
     * Create a new event instance.
     *
     * @param Pizza $pizza
     */
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza ;
    }


    public function broadcastWith() {
            return ['command' => $this->pizza];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('pizza-notif');
    }

    public function broadcastAs()
    {
        return 'CommandNotification';
    }
}
