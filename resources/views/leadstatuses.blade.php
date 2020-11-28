@extends('layouts.baselayout')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Lead Statuses</h3>

            <table class="table table-bordered table-hover">
        
                <thead class="thead-dark">
        
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($leadStatuses as $leadStatus)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $leadStatus->name }}</td>

                            <td>

                                <form method="POST" action="{{ route('leadstatus.remove', $leadStatus->id) }}">

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
