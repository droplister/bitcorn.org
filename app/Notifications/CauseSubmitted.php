<?php

namespace App\Notifications;

use App\Cause;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CauseSubmitted extends Notification
{
    use Queueable;

    protected $cause;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cause $cause)
    {
        $this->cause = $cause;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Notify Foundation Chatroom
     */
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content("{$this->cause->name}\nBy: {$this->cause->user->name}")
            ->button('Review Cause', route('causes.show', ['cause' => $this->cause->id]));
    }
}