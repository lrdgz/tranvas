@extends('html')

@section('content')
    <div class="container">
        <form action="{{route('event-save')}}" method="POST" id="localForm">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header"><h3>Add new Event</h3></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter the event">
                                <span class="error">{{ $errors->first('title') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter the event address">
                                <span class="error">{{ $errors->first('address') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter the event start date">
                                <span class="error">{{ $errors->first('start_date') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Enter the event end date">
                                <span class="error">{{ $errors->first('end_date') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"  cols="30" rows="10" placeholder="Enter the event description"></textarea>
                                <span class="error">{{ $errors->first('description') }}</span>
                            </div>

                            <button class="btn btn-primary">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header"><h3>Select the location</h3></div>
                        <div class="card-body">

                            <div class="form-group">
                                <span class="error">{{ $errors->first('lat') }}</span>
                                <span class="error">{{ $errors->first('long') }}</span>
                                <event-location></event-location>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer-script')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        setTimeout(function(){
            CKEDITOR.replace( 'description' );
        },100);
    </script>
@endsection

@section('header-styles')
@endsection
