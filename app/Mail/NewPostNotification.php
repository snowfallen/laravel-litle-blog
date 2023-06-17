<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @return NewPostNotification
     */
    public function build(): NewPostNotification
    {
        return $this->subject('New Post Notification')
            ->view('emails.new_post_notification');
    }
}
