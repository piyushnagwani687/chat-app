<?php

namespace App\Jobs;

use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MessageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Message $message)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        SendMessage::dispatch([
            'id' => $this->message->id,
            'sender_id' => $this->message->sender_id,
            'receiver_id' => $this->message->receiver_id,
            'text' => $this->message->text,
            'time' => $this->message->created_at,
        ]);
    }
}
