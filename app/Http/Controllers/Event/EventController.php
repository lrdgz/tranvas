<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Modules\Event\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $today = Carbon::today()->format('Y-m-d');
        $upcomingEvents = Event::where('end_date', '>', $today)->orderBy('start_date','desc')->get();
        $pastEvents      = Event::where('end_date', '<', $today)->orderBy('start_date','desc')->get();

        return view('event.event-list')->with('upcomingEvents',$upcomingEvents)->with('pastEvents',$pastEvents);
    }
}
