@extends('layouts.baselayout')

@section('title', 'Add New Member')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Add New Member</h3>

        </div>

        <div class="row">

            <form method="POST" action="{{ route('person.add.submit') }}">

                @csrf

                <div class="form-group">

                    <label>Name:</label>

                    <input type="text" name="name" class="form-control">

                </div>

                <input type="submit" value="Add" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
