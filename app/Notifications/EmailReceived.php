<?php

namespace App\Notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailReceived extends Notification
{
    use Queueable;

    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
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
            ->content("{$this->name} \n {$this->email} \n {$this->message}");
    }
}