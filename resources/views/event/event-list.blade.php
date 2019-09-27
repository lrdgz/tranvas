@extends('html')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col">
                <h1>
                    Upcoming Events
                    <span class="pull-right">
                        <a href="{{ route('event-add') }}" class="btn btn-success">Add Event</a>
                    </span>
                </h1>

                @foreach($upcomingEvents as $upcomingEvent)
{{--                    {{ dump($upcomingEvent->toArray()) }}--}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('event-view', $upcomingEvent->slug) }}">{{ $upcomingEvent->id }} {{ $upcomingEvent->title }}</a>
                            </h3>
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
                            <div class="description margin-bottom-20">
                                <p> {!! limit_words($upcomingEvent->description, 50) !!} </p>
                            </div>
                            <div class="button-container margin-bottom-20">
                                @if($upcomingEvent->user === null)
{{--                                    <button class="btn btn-success">Register</button>--}}
                                    <event-registration
                                        text="Register"
                                        mode="btn-success"
                                        event-id="{{ $upcomingEvent->id }}"
                                    ></event-registration>
                                @else
{{--                                    <button class="btn btn-warning">De-Register</button>--}}
                                    <event-registration
                                        text="De-Register"
                                        mode="btn-warning"
                                        event-id="{{ $upcomingEvent->id }}"
                                    ></event-registration>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col">
                <h1>Past Events</h1>

                @if(0 == 0)
                    <h3>No Pas Events</h3>
                @else
                    @foreach($pastEvents as $pastEvent)
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="{{ route('event-view', $pastEvent->slug) }}">{{ $pastEvent->id }} {{ $pastEvent->title }}</a>
                                </h3>
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
                                <div class="description margin-bottom-20">
                                    <p> {!! limit_words($pastEvent->description, 50) !!} </p>
                                </div>
                                <div class="button-container margin-bottom-20">
                                    @if($upcomingEvent->user === null)
                                        <button class="btn btn-success">Register</button>
                                        <event-registration
                                            text="Register"
                                            mode="btn-success"
                                            eventID=""
                                        ></event-registration>
                                    @else
                                        <button class="btn btn-warning">De-Register</button>
                                        <event-registration
                                            text="De-Register"
                                            mode="btn-warning"
                                            eventID=""
                                        ></event-registration>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        <example></example>
    </div>
@endsection
