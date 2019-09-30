<?php


namespace App\Modules\Event\Http\Controllers;

use App\Modules\Event\Event;
use App\Modules\Event\Participant;
use App\Modules\Event\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class EventsApiController extends Controller{

    protected $event;

    public function __construct(EventRepository $repository){
        $this->event = $repository;
    }

    public function handleRegistration(Request $request){
        $user = $request->user();
        $event = $this->event->getById($request->input('eventID'));
        $participant = Participant::where('user_id', $user->id)
            ->where('event_id',$event->id)
            ->first();

         if (!$participant){
             $this->event->registerForEvent($event);
             return response(['message'=> 'Registered.'], 201);
         }

        $this->event->deRegisterFromEvent($event);
        return response(['message'=> 'De-registered.'], 200);
    }

}
