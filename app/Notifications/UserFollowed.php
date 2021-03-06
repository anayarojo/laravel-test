<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \Illuminate\Broadcasting\BroadcastManager;

class UserFollowed extends Notification
{
    use Queueable;

    public $follower;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $follower)
    {
        $this->follower = $follower;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', "database"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("You have a new follower")
            ->greeting("Hello " . $notifiable->name)
            ->line("The user @" . $this->follower->username . " is following")
            ->action('Show profile', url('http://localhost:8000/users/' . $this->follower->username))
            ->salutation("Thanks for use anayarojo");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "follower" => $this->follower,
        ];
    }

    public function toBroadCast(){
        return new BroadcastManager(
            $this->toArray($notifiable)
        );
    }
}
