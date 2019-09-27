<?php


namespace App\Modules\Event\Repositories;

use App\Modules\Event\Event;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EloquentEvents extends AbstractRepository implements EventRepository {

    protected $model;

    public function __construct(Event $event){
        $this->model = $event;
    }

    public function getUpcomingEvents(){

        $select = [
            'e.id','e.title','e.description','e.address','e.start_date','e.end_date','e.slug','e.user_id',
            'p.user_id as user'
        ];

        $today = Carbon::today()->format('Y-m-d');
        return $this->model
            ->select($select)
            ->from('events as e')
            ->leftJoin('participants as p', function ($query){
                $query->on('p.event_id', '=','e.id');
                $query->where('p.user_id', '=', Auth::user()->id);
            })
            ->where('e.end_date', '>', $today)->orderBy('e.start_date','desc')->get();
    }

    public function getPastEvents(){
        $today = Carbon::today()->format('Y-m-d');
       $this->model->where('end_date', '<', $today)->orderBy('start_date','desc')->get();
    }

}
