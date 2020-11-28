@extends('layouts.baselayout')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Sources</h3>

            <table class="table table-bordered table-hover">
        
                <thead class="thead-dark">
        
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($sources as $source)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $source->name }}</td>

                            <td>

                                <form method="POST" action="{{ route('source.remove', $source->id) }}">

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
