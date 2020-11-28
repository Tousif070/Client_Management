@extends('layouts.baselayout')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Add New Source</h3>

        </div>

        <div class="row">

            <form method="POST" action="{{ route('source.add.submit') }}">

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