<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public array $message)
    {
    }

    public function broadcastOn()
    {
        Log::info('Broadcasting on channel: chat.' . $this->message['receiver_id']);
        return new PrivateChannel('chat.'.$this->message['sender_id']);

    }

    public function broadcastAs(): string
    {
        return 'SendMessage';
    }
}
