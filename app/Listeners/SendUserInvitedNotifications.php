<?php

namespace App\Listeners;

use App\Events\UserInviteCreated;
use App\Notifications\UserInvitedNotification;
use App\Services\UserInvite\GetUserInvite;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserInvitedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserInviteCreated $event): void
    {
        $invitedUserToNotify = GetUserInvite::getById($event->userInvite->id);
        $invitedUserToNotify->notify(new UserInvitedNotification($event->userInvite));
    }
}
