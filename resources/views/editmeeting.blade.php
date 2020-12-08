@extends('layouts.baselayout')

@section('title', 'Edit Meeting')

@section('content')

    <div class="container mb-4">

        <div class="row">

            <h3 class="mb-4">Edit Meeting</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" action="{{ route('meeting.edit.submit', $meeting->id) }}">

                @csrf

                <div class="form-group">

                    <label>Title:</label>

                    <input type="text" name="title" value="{{ old('title') ? old('title') : $meeting->title }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('title') }}</div>

                </div>

                <div class="form-group">

                    <label>Agenda:</label>

                    <textarea name="agenda" class="form-control" rows="3">{{ old('agenda') ? old('agenda') : $meeting->agenda }}</textarea>

                    <div class="text-danger">{{ $errors->first('agenda') }}</div>

                </div>

                <div class="form-group">

                    <label>Client:</label>

                    <input type="text" disabled value="{{ $meeting->client->name }}" class="form-control" style="font-weight: 500; background-color: white;">

                </div>

                <div class="form-group">

                    <label>Assigned Person:</label>

                    <select class="form-control" name="person_id">

                        @foreach($persons as $person)

                        <option value="{{ $person->id }}" {{ (old('person_id') ? (old('person_id') == $person->id ? "selected" : "") : ($person->id == $meeting->client->person->id ? "selected" : "")) }}>{{ $person->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('person_id') }}</div>

                </div>

                <div class="form-group">

                    <label>Service:</label>

                    <input type="text" disabled value="{{ $meeting->client->service->name }}" class="form-control" style="font-weight: 500; background-color: white;">

                </div>

                <div class="form-group">

                    <label>Lead Status:</label>

                    <select class="form-control" name="lead_status_id">

                        @foreach($leadStatuses as $leadStatus)

                        <option value="{{ $leadStatus->id }}" {{ (old('lead_status_id') ? (old('lead_status_id') == $leadStatus->id ? "selected" : "") : ($leadStatus->id == $meeting->client->leadStatus->id ? "selected" : "")) }}>{{ $leadStatus->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('lead_status_id') }}</div>

                </div>

                <div class="form-group">

                    <label>Date:</label>

                    <input type="date" name="date" value="{{ old('date') ? old('date') : $meeting->date }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('date') }}</div>

                </div>

                <div class="form-group">

                    <label>Time:</label>

                    <input type="time" name="time" value="{{ old('time') ? old('time') : $meeting->time }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('time') }}</div>

                </div>





                <input type="submit" value="Save" class="btn btn-primary">





            </form>

        </div>

    </div>

@endsection
