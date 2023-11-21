<?php

namespace App\Notifications;

use App\Models\UserInvite;
use App\Services\User\GetUser;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserInvitedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public UserInvite $userInvite)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $invitedByUser = GetUser::get($this->userInvite->user_id);

        return (new MailMessage)
            ->subject("You've been invited to join an organization!")
            ->greeting("{$invitedByUser->name} invites you to join them.")
            ->line('Follow the link below to get started!')
            ->action('Register', url("register/invited/{$this->userInvite->invite_code}"))
            ->line('Thank you for using our application!');
    }
}
