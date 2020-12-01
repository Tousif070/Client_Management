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

                                <a href="{{ route('service.edit', $service->id) }}" class="btn btn-info mr-2" style="font-size: 12px;">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#service{{ $service->id }}" style="font-size: 12px;">Remove</button>

                                <div class="modal fade" id="service{{ $service->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Service</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form method="POST" action="{{ route('service.remove', $service->id) }}">

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
