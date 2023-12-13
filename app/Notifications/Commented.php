<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Commented extends Notification
{
    use Queueable;

    public $post;
    public $commenter;
    public $content;

    /**
     * Create a new notification instance.
     */
    public function __construct(object $notifiable, $commenter, $content)
    {
        $this->post = $notifiable;
        $this->commenter = $commenter;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/post/'.$this->post->id);
        return (new MailMessage)
            ->subject('Someone replied to you!')
            ->line(new HtmlString(
                'User <i>'.$this->commenter.'</i> replied to you:
                <br><i>'.$this->content.'</i>'
                ))
            ->action('View post', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
