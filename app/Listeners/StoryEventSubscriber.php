<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class StoryEventSubscriber {


    public function subscribe($events)
    {
        $events->listen(
            'App\Events\StoryCreated',
            'App\Listeners\StoryEventSubscriber@handleStortyCreated'
        );

        $events->listen(
            'App\Events\StoryUpdated',
            'App\Listeners\StoryEventSubscriber@handleStortyUpdated'
        );
    }

    public function handleStortyCreated($event)
    {
        Log::info('Inside subscriber, A story with title ' . $event->title . ' was added.');
    }

    public function handleStortyUpdated($event)
    {
        Log::info('Inside subscriber, A story with title ' . $event->title . ' was updated.');
    }
}