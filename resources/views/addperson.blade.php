@extends('layouts.baselayout')

@section('title', 'Add New Member')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Add New Member</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" action="{{ route('person.add.submit') }}">

                @csrf

                <div class="mb-3">
                    <span style="color: crimson; font-size: 18px;">*</span> - Required
                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Name:
                    </label>

                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                    <div class="text-danger">{{ $errors->first('name') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Designation:
                    </label>

                    <input type="text" name="designation" class="form-control" value="{{ old('designation') }}">

                    <div class="text-danger">{{ $errors->first('designation') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Phone Number (Mobile):
                    </label>

                    <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}">

                    <div class="text-danger">{{ $errors->first('contact_number') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Email:
                    </label>

                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">

                    <div class="text-danger">{{ $errors->first('email') }}</div>

                </div>

                <input type="submit" value="Add" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
