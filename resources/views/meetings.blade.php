@extends('layouts.baselayout')

@section('title', 'Meetings')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Meetings</h3>

            <table class="table table-bordered table-hover">

                <thead class="thead-dark">

                    <tr>
                        <th>Sl. No.</th>
                        <th>Title</th>
                        <th>Agenda</th>
                        <th>Client Name</th>
                        <th>Assigned Person</th>
                        <th>Service</th>
                        <th>Lead Status</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($meetings as $meeting)

                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $meeting->title }}</td>
                            <td>{{ $meeting->agenda }}</td>
                            <td>{{ $meeting->client->name }}</td>
                            <td>{{ $meeting->client->person->name }}</td>
                            <td>{{ $meeting->client->service->name }}</td>
                            <td>{{ $meeting->client->leadStatus->name }}</td>
                            <td>{{ $meeting->date }}</td>
                            <td>{{ $meeting->time }}</td>

                            <td>

                                <a href="{{ route('meeting.edit', $meeting->id) }}" class="btn btn-info mr-2 mb-2" style="font-size: 12px;">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#meeting{{ $meeting->id }}" style="font-size: 12px;">Remove</button>

                                <div class="modal fade" id="meeting{{ $meeting->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Meeting</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form method="POST" action="{{ route('meeting.remove', $meeting->id) }}">

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
