@extends('layouts.baselayout')

@section('title', 'Search Client')

@section('content')

    <div class="container">

        <div class="row">

            <h3 class="mb-4">Search Client</h3>

        </div>

        <div class="row">

            @if(isset($msg))

                <div class="col-sm-12 alert alert-info alert-dismissible fade show" role="alert">

                    <strong>{{ $msg }}</strong>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

            @endif

        </div>

        <div class="row">

            <form class="col-sm-8" method="POST" action="{{ route('client.search.submit') }}">

                @csrf

                <div class="mb-3">
                    <span style="color: crimson; font-size: 18px;">*</span> - Required
                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Client Name:
                    </label>

                    <input type="text" name="search_index" class="form-control" placeholder="Enter Client Name" value="{{ isset($old_search_index) ? $old_search_index : old('search_index') }}">

                    <div class="text-danger">{{ $errors->first('search_index') }}</div>

                </div>

                <input type="submit" value="Search" class="btn btn-primary">

            </form>

        </div>

        <div class="row mt-4">

            @if(isset($clients))


            <table class="table table-bordered table-hover">

                <thead class="thead-dark">

                    <tr>
                        <th>Sl. No.</th>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($clients as $client)

                    <tr>
                        <td>{{ ++$serial }}</td>
                        <td>{{ $client->custom_id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-info" style="font-size: 12px;">View</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>


            @endif

        </div>

    </div>

@endsection
