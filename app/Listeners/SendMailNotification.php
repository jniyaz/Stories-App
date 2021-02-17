<?php

namespace App\Listeners;

use App\Mail\NewStory;
use App\Events\StoryCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoryCreated  $event
     * @return void
     */
    public function handle(StoryCreated $event)
    {
        // Mail Notification
        Mail::send(new NewStory($event->title));
    }
}
