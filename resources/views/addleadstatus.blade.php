@extends('layouts.baselayout')

@section('title', 'Add New Lead Status')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Add New Lead Status</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" action="{{ route('leadstatus.add.submit') }}">

                @csrf

                <div class="form-group">

                    <label>Name:</label>

                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                    <div class="text-danger">{{ $errors->first('name') }}</div>

                </div>

                <input type="submit" value="Add" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
