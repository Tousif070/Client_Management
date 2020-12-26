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

                <div class="form-group">

                    <label>Designation:</label>

                    <input type="text" name="designation" value="{{ old('designation') ? old('designation') : $person->designation }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('designation') }}</div>

                </div>
    
                <div class="form-group">

                    <label>Phone Number (Mobile):</label>

                    <input type="text" name="contact_number" value="{{ old('contact_number') ? old('contact_number') : $person->contact_number }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('contact_number') }}</div>

                    @if(Session::has('error_contact_number'))

                        <div class="text-danger">

                            {{ Session::get('error_contact_number') }}

                        </div>

                    @endif

                </div>

                <div class="form-group">

                    <label>Email:</label>

                    <input type="text" name="email" value="{{ old('email') ? old('email') : $person->email }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('email') }}</div>

                    @if(Session::has('error_email'))

                        <div class="text-danger">

                            {{ Session::get('error_email') }}

                        </div>

                    @endif

                </div>

                <input type="submit" value="Save" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
