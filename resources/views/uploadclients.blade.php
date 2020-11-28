@extends('layouts.baselayout')

@section('title', 'Upload Excel File')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Upload Excel File</h3>

            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        </div>

        <div class="row">

            <form method="POST" enctype="multipart/form-data" action="{{ route('clients.import') }}">

                @csrf

                <input type="file" name="my_file">
                
                <input type="submit" value="Upload" class="btn btn-primary">

            </form>

        </div>

    </div>

@endsection
