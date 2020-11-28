@extends('layouts.baselayout')

@section('title', 'Services')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Services</h3>

            <table class="table table-bordered table-hover">
        
                <thead class="thead-dark">
        
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($services as $service)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $service->name }}</td>

                            <td>

                                <form method="POST" action="{{ route('service.remove', $service->id) }}">

                                    @csrf

                                    <input type="submit" value="Remove" class="btn btn-danger" style="font-size: 12px">

                                </form>

                            </td>

                        </tr>
        
                    @endforeach
        
                </tbody>
        
            </table>

        </div>

    </div>

@endsection