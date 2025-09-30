<?php

namespace Modules\Expenses\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Expenses\Models\Expense;

class ExpenseCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Expense $expense;

    /**
     * Create a new event instance.
     */
    public function __construct(Expense $expense) {
        $this->expense = $expense;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
