@extends('layouts.baselayout')

@section('title', 'Meetings')

@section('content')

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-12">

                <h3>Meetings</h3>

            </div>

        </div>


        <div class="row">

            <div class="col-12">

                <h4>View</h4>

            </div>

        </div>


        <div class="row">

            @if($errors->any())

            <div class="col text-danger text-center mb-2">Please Fill Out The Date & Time Ranges For Filtering !</div>

            @endif

        </div>


        <form method="POST" action="{{ route('meetings.filter') }}">

            @csrf

            <div class="row mb-2 ml-2">

                <div class="col-1 mt-1">
                    <label><h5>From:</h5></label>
                </div>

                <div class="col-md-4 mb-2">
                    <input type="date" name="from_date" value="{{ isset($from_date) ? $from_date : old('from_date') }}" class="form-control">
                </div>

                <div class="col-md-3">
                    <input type="time" name="from_time" value="{{ isset($from_time) ? $from_time : old('from_time') }}" class="form-control">
                </div>

            </div>

            <div class="row mb-4 ml-2">

                <div class="col-1 mt-1">
                    <label><h5>To:</h5></label>
                </div>

                <div class="col-md-4 mb-2">
                    <input type="date" name="to_date" value="{{ isset($to_date) ? $to_date : old('to_date') }}" class="form-control">
                </div>

                <div class="col-md-3 mb-2">
                    <input type="time" name="to_time" value="{{ isset($to_time) ? $to_time : old('to_time') }}" class="form-control">
                </div>

                <div class="col-md-2 mb-2">

                    <select name="meeting_status" class="form-control">
                        <option value="1" {{ (isset($meeting_status) ? ($meeting_status == "1" ? "selected" : "") : "selected") }}>All</option>
                        <option value="Pending" {{ (isset($meeting_status) ? ($meeting_status == "Pending" ? "selected" : "") : "") }}>Pending</option>
                        <option value="Expired" {{ (isset($meeting_status) ? ($meeting_status == "Expired" ? "selected" : "") : "") }}>Expired</option>
                    <select>

                </div>

                <div class="col-md-2">
                    <input type="submit" value="Filter Meetings" class="btn btn-primary">
                </div>

            </div>

        </form>


        <div class="row">

            <div class="col-12">

                <table class="table table-bordered table-hover">

                    <thead class="thead-dark">
    
                        <tr>
                            <th>Sl. No.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Client Name</th>
                            <th>Assigned Person</th>
                            <th>Title</th>
                            <th>Agenda</th>
                            <th>Service</th>
                            <th>Lead Status</th>
                            <th>Meeting Status</th>
                            <th></th>
                        </tr>
    
                    </thead>
    
                    <tbody>
    
                        @foreach($meetings as $meeting)
    
                            <tr>
                                <td>{{ ++$serial }}</td>
                                <td>{{ date_format(date_create($meeting->date), 'M-d-Y') }}</td>
                                <td>{{ date_format(date_create($meeting->time), 'h:i A') }}</td>
                                <td>{{ $meeting->client->name }}</td>
                                <td>{{ $meeting->client->person->name }}</td>
                                <td>{{ $meeting->title }}</td>
                                <td>{{ $meeting->agenda }}</td>
                                <td>{{ $meeting->client->service->name }}</td>
                                <td>{{ $meeting->client->leadStatus->name }}</td>
                                <td>{{ $meeting->status }}</td>
    
                                <td>
    
                                    <a href="{{ route('meeting.edit', $meeting->id) }}" class="btn btn-info mr-2 mb-2" style="font-size: 12px;">Edit</a>
    
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#meeting{{ $meeting->id }}" style="font-size: 12px;">Remove</button>
    
                                    <div class="modal fade" id="meeting{{ $meeting->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Remove Meeting</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure ?</p>
                                                </div>
                                                <div class="modal-footer">
    
                                                    <form method="POST" action="{{ route('meeting.remove', $meeting->id) }}">
    
                                                        @csrf
    
                                                        <input type="submit" class="btn btn-primary" value="Yes">
    
                                                    </form>
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </td>
    
                            </tr>
    
                        @endforeach
    
                    </tbody>
    
                </table>

            </div>

        </div>

    </div>

@endsection
