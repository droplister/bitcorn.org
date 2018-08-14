<?php

namespace App\Notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Notification
{
    use Queueable;

    protected $name;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
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
            ->content("**User Registered:**\n{$this->name} <{$this->email}>");
    }
}