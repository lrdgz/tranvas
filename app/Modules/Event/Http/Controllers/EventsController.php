<?php

namespace App\Modules\Event\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Event\Event;
use App\Modules\Event\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventsController extends Controller {

    protected $events;

    public function __construct(EventRepository $repository){
        $this->events = $repository;
    }

    public function index(){
        $today = Carbon::today()->format('Y-m-d');
        $upcomingEvents = $this->events->getUpcomingEvents();
        $pastEvents     = $this->events->getPastEvents();

        return view('event.event-list')->with('upcomingEvents',$upcomingEvents)->with('pastEvents',$pastEvents);
    }

    public function view(Event $event){
        return view('event.event-view')->with('event',$event);
    }

    public function add(){
        return view('event.event-add');
    }

    public function store(Request $request){

//        dd($request->all());

        $valitator = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'address'       => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'lat'           => 'required',
            'lng'           => 'required',
        ]);

//        if($valitator->fails()){
//            return redirect()->back()->withErrors($valitator)->withInput();
//        }

        Event::create([
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'address'       => $request->input('address'),
            'start_date'    => $request->input('start_date'),
            'end_date'      => $request->input('end_date'),
            'lat'           => $request->input('lat'),
            'long'          => $request->input('lng'),
            'slug'          => Str::slug($request->input('title')) . '-' . uniqid(time()),
            'user_id'       => $request->user()->id
        ]);
        return redirect()->route('events');
//        return redirect()->back();

    }
}
