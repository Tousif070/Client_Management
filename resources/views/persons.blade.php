@extends('layouts.baselayout')

@section('title', 'Office Members')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Office Members</h3>

            <table class="table table-bordered table-hover">
        
                <thead class="thead-dark">
        
                    <tr>
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($persons as $person)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $person->name }}</td>

                            <td>

                                <form method="POST" action="{{ route('person.remove', $person->id) }}">

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
