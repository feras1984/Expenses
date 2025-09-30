<?php

namespace Modules\Expenses\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Expenses\Models\Expense;

class ExpenseCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(Public Expense $expense) {}

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Expense Created')
            ->line('A new Expense has been created')
            ->action('Notification Action', 'http://localhost.com')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'id'        => $this->expense->id,
            'title'     => $this->expense->title,
            'amount'    => $this->expense->amount,
            'date'      => $this->expense->expense_date,
        ];
    }
}
