@extends('layouts.baselayout')

@section('title', 'Upload Excel File')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Upload Excel File</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>
                
            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" enctype="multipart/form-data" action="{{ route('clients.import') }}">

                @csrf

                <div class="form-group">

                    <input type="file" name="my_file">

                    <div class="text-danger">{{ $errors->first('my_file') }}</div>

                </div>
                
                <input type="submit" value="Upload" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
