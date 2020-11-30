@extends('layouts.baselayout')

@section('title', 'Edit Office Member')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Edit Office Member</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" action="{{ route('person.edit.submit', $person->id) }}">

                @csrf

                <div class="form-group">

                    <label>Name:</label>

                    <input type="text" name="name" value="{{ old('name') ? old('name') : $person->name }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('name') }}</div>

                </div>

                <input type="submit" value="Save" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
