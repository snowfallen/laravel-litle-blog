<?php

namespace App\Actions;

use App\Mail\NewPostNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedNotificationAction
{
    /**
     * @return void
     */
    public function execute(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewPostNotification);
        }
    }
}
