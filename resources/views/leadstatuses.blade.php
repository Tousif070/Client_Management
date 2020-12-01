@extends('layouts.baselayout')

@section('title', 'Lead Statuses')

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

                                <a href="{{ route('leadstatus.edit', $leadStatus->id) }}" class="btn btn-info mr-2" style="font-size: 12px;">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#leadStatus{{ $leadStatus->id }}" style="font-size: 12px;">Remove</button>

                                <div class="modal fade" id="leadStatus{{ $leadStatus->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Lead Status</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form method="POST" action="{{ route('leadstatus.remove', $leadStatus->id) }}">

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
