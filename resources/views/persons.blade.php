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
                        <th>Designation</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($persons as $person)

                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->designation }}</td>
                            <td>{{ $person->contact_number }}</td>
                            <td>{{ $person->email }}</td>

                            <td>

                                <a href="{{ route('person.edit', $person->id) }}" class="btn btn-info mr-2" style="font-size: 12px;">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#person{{ $person->id }}" style="font-size: 12px;">Remove</button>

                                <div class="modal fade" id="person{{ $person->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Office Member</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form method="POST" action="{{ route('person.remove', $person->id) }}">

                                                    @csrf

                                                    <input type="submit" class="btn btn-primary" value="Yes">

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
