<?php

namespace Modules\Expenses\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Modules\Expenses\Events\ExpenseCreatedEvent;
use Modules\Expenses\Notifications\ExpenseCreatedNotification;

class ExpenseCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(ExpenseCreatedEvent $event): void {
        Notification::route('mail', 'hello@example.com')
            ->notify(new ExpenseCreatedNotification($event->expense));
    }
}
