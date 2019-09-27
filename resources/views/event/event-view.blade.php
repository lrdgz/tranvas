@extends('html')

@section('content')

    <div class="row align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $event->title }}
                    </h3>
                </div>
                <div class="card-body">
                    <p><strong>Description: </strong></p>
                    <p> {!! $event->description !!} </p>
                </div>

                <div id="map"></div>

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Start Date:</strong></td>
                            <td>{{ $event->start_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>End Date:</strong></td>
                            <td>{{ $event->end_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td>{{ $event->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Created By:</strong></td>
                            <td><a href="#"> {{ $event->creator->name }} </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('footer-script')
    <script>
        function initMap(){
            var uluru = { lat: {{$event->lat}}, lng: {{$event->long}} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap" type="text/javascript"></script>
@endsection

@section('header-styles')
    <style>
        #map{
            height: 400px;
            width: 100%;
        }
    </style>
@endsection
