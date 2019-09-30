<?php


namespace App\Modules\Event\Listeners;


use App\Modules\Event\Events\EventRegistered;

class EventEventsListener{

    public function handleEventRegistered(EventRegistered $eventRegistered){

    }

    public function subscribe($events){
        $class = "App\Modules\Event\Listeners\EventEventsListener";

        $events->listen(EventRegistered::class, "{$class}@handleEventRegistered");
    }

}
