@extends('layouts.baselayout')

@section('title', 'Create New Meeting')

@section('content')

    <div class="container mb-4">

        <div class="row">

            <h3 class="mb-4">Create New Meeting</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            {{-- FORM STARTS HERE --}}

            <form class="col-sm-8" method="POST" action="{{ route('meeting.add.submit') }}">

                @csrf

                <div class="form-group">

                    <label>Client:</label>

                    <select class="form-control" name="client_id">

                        <option selected disabled>Select</option>

                        @foreach($clients as $client)

                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? "selected" : "" }}>{{ $client->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('client_id') }}</div>

                </div>

                <div class="form-group">

                    <label>Title:</label>

                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('title') }}</div>

                </div>

                <div class="form-group">

                    <label>Agenda:</label>

                    <textarea name="agenda" class="form-control" rows="3">{{ old('agenda') }}</textarea>

                    <div class="text-danger">{{ $errors->first('agenda') }}</div>

                </div>

                <div class="form-group">

                    <label>Date:</label>

                    <input type="date" name="date" value="{{ old('date') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('date') }}</div>

                </div>

                <div class="form-group">

                    <label>Time:</label>

                    <input type="time" name="time" value="{{ old('time') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('time') }}</div>

                </div>





                <input type="submit" value="Create" class="btn btn-primary">





            </form>

            {{-- FORM ENDS HERE --}}

        </div>

    </div>

@endsection
