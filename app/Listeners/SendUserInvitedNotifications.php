<?php

namespace App\Listeners;

use App\Models\UserInvite;
use App\Events\UserInviteCreated;
use App\Notifications\UserInvitedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        $invitedUserToNotify = UserInvite::where('id', $event->userInvite->id)->first();
        $invitedUserToNotify->notify(new UserInvitedNotification($event->userInvite));
    }
}