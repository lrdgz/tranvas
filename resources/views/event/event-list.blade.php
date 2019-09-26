@extends('html')

@section('content')

    <div class="row align-items-center">
        <div class="col">
            <h1>Upcoming Events</h1>

            @foreach($upcomingEvents as $upcomingEvent)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $upcomingEvent->title }}</h3>
                        <small class="padding-left-10"> {{ $upcomingEvent->address }} </small>
                    </div>
                    <div class="card-body">
                        <div class="meta-data margin-bottom-20">
                            <strong>Start Date: </strong> {{ $upcomingEvent->start_date }}
                            <br>
                            <strong>End Date: </strong> {{ $upcomingEvent->end_date }}
                            <br>
                            <strong>Created By: </strong> {{ $upcomingEvent->creator->name }}
                        </div>
                        <div class="description">
                            <p> {{ $upcomingEvent->description }} </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <div class="row align-items-center">
        <div class="col">
            <h1>Past Events</h1>

            @if(count($pastEvents) == 0)
                <h3>No Pas Events</h3>
            @else
                @foreach($pastEvents as $pastEvent)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $pastEvent->title }}</h3>
                            <small class="padding-left-10"> {{ $pastEvent->address }} </small>
                        </div>
                        <div class="card-body margin-bottom-20">
                            <div class="meta-data">
                                <strong>Start Date: </strong> {{ $pastEvent->start_date }}
                                <br>
                                <strong>End Date: </strong> {{ $pastEvent->end_date }}
                                <br>
                                <strong>Created By: </strong> {{ $pastEvent->creator->name }}
                            </div>
                            <div class="description">
                                <p> {{ $pastEvent->description }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

@endsection
