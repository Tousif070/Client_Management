@extends('layouts.baselayout')

@section('title', 'Sources')

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

                                <a href="{{ route('source.edit', $source->id) }}" class="btn btn-info mr-2" style="font-size: 12px;">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#source{{ $source->id }}" style="font-size: 12px;">Remove</button>

                                <div class="modal fade" id="source{{ $source->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Source</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form method="POST" action="{{ route('source.remove', $source->id) }}">

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
