<?php

namespace App\Listeners;

use App\Actions\SendPostCreatedNotificationAction;
use App\Jobs\SendNewPostNotification;

class PostCreatedListener
{
    /**
     * @return void
     */
    public function handle(): void
    {
        SendNewPostNotification::dispatch();
//        $sendNotificationAction = new SendPostCreatedNotificationAction();
//        $sendNotificationAction->execute();
    }
}
