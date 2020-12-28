@extends('layouts.clientslayout')

@section('title', 'Clients')

@section('content')

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-12">

                <h3>Clients</h3>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <h4>View</h4>

            </div>

        </div>

        <div class="row mb-4 ml-2">

            <div class="col-12">

                <form name="filter_form" class="row" method="POST" action="{{ route('clients.filter') }}">

                    @csrf

                    <div class="col-1 mt-1 mb-2">
                        <label><h5>From:</h5></label>
                    </div>

                    <div class="col-3">
                        <input type="date" name="from_date" value="{{ isset($from_date) ? $from_date : "" }}" class="form-control">
                    </div>

                    <div class="col-1 mt-1">
                        <label><h5>To:</h5></label>
                    </div>

                    <div class="col-3">
                        <input type="date" name="to_date" value="{{ isset($to_date) ? $to_date : "" }}" class="form-control">
                    </div>

                    <div class="col-xl-2 mb-2">
                        <input type="submit" value="Filter Client Data" class="btn btn-primary">
                    </div>

                    <div class="col-xl-2 mb-2">
                        <input type="button" value="Download Client Data" onclick="download()" class="btn btn-success">
                    </div>

                </form>

            </div>

        </div>

            {{-- <div class="col-xl-2 mb-4">

                <a href="{{ route('clients.export') }}" class="btn btn-success">Download Client Data</a>

            </div> --}}

        <div class="row">

            <div class="col-12">

                <table class="table table-bordered table-sm">

                    <thead class="thead-dark">

                        <tr>
                            <th>Sl. No.</th>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Company Name</th>
                            <th>Conversion Date</th>
                            <th>Source</th>
                            <th>Assigned Person</th>
                            <th>Service Requirement</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Lead Status</th>
                            <th>Comment-1</th>
                            <th>Comment-2</th>
                            <th></th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($clients as $client)

                            <tr>

                                <td>{{ ++$serial }}</td>

                                <td>{{ $client->custom_id }}</td>

                                <td><input class="{{ $client->id }}" type="text" disabled name="client_name" value="{{ $client->name }}"></td>

                                <td><input class="{{ $client->id }}" type="text" disabled name="company_name" value="{{ $client->company_name }}"></td>

                                <td><input class="{{ $client->id }}" type="date" disabled name="conversion_date" value="{{ $client->conversion_date }}"></td>

                                <td>

                                    <select class="{{ $client->id }}" disabled name="source_id">

                                        @foreach($sources as $source)

                                            @if($source->id == $client->source_id)

                                                <option selected value="{{ $source->id }}">{{ $source->name }}</option>

                                            @else

                                                <option value="{{ $source->id }}">{{ $source->name }}</option>

                                            @endif

                                        @endforeach

                                    </select>

                                </td>

                                <td>

                                    <select class="{{ $client->id }}" disabled name="assigned_person_id">

                                        @foreach($persons as $person)

                                            @if($person->id == $client->person_id)

                                                <option selected value="{{ $person->id }}">{{ $person->name }}</option>

                                            @else

                                                <option value="{{ $person->id }}">{{ $person->name }}</option>

                                            @endif

                                        @endforeach

                                    </select>

                                </td>

                                <td>

                                    <select class="{{ $client->id }}" disabled name="service_id">

                                        @foreach($services as $service)

                                            @if($service->id == $client->service_id)

                                                <option selected value="{{ $service->id }}">{{ $service->name }}</option>

                                            @else

                                                <option value="{{ $service->id }}">{{ $service->name }}</option>

                                            @endif

                                        @endforeach

                                    </select>

                                </td>

                                <td><input class="{{ $client->id }}" type="text" disabled name="contact_number" value="{{ $client->contact_number }}"></td>

                                <td><input class="{{ $client->id }}" type="email" disabled name="email" value="{{ $client->email }}"></td>

                                <td>
                                    <textarea class="{{ $client->id }}" disabled name="address" rows="3">{{ $client->address }}</textarea>
                                </td>

                                <td>

                                    <select class="{{ $client->id }}" disabled name="lead_status_id">

                                        @foreach($leadStatuses as $leadStatus)

                                            @if($leadStatus->id == $client->lead_status_id)

                                                <option selected value="{{ $leadStatus->id }}">{{ $leadStatus->name }}</option>

                                            @else

                                                <option value="{{ $leadStatus->id }}">{{ $leadStatus->name }}</option>

                                            @endif

                                        @endforeach

                                    </select>

                                </td>

                                <td>
                                    <textarea class="{{ $client->id }}" disabled name="comment_1" rows="3">{{ $client->comment_1 }}</textarea>
                                </td>

                                <td>
                                    <textarea class="{{ $client->id }}" disabled name="comment_2" rows="3">{{ $client->comment_2 }}</textarea>
                                </td>




                                <td><button id="{{ $client->id }}" onclick="change(this.id)" class="btn btn-info" style="font-size: 14px">Edit</button></td>




                                <td>

                                    <button class="btn btn-danger" data-toggle="modal" data-target="#client{{ $client->id }}" style="font-size: 14px;">Remove</button>

                                    <div class="modal fade" id="client{{ $client->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Remove Client</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure ?</p>
                                                </div>
                                                <div class="modal-footer">

                                                    <form method="POST" action="{{ route('client.remove', $client->id) }}">

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

    </div>

    <script>

        function download()
        {
            let date_range = {
                from_date: document.forms['filter_form']['from_date'].value,
                to_date: document.forms['filter_form']['to_date'].value
            }

            let ajax = new XMLHttpRequest()

            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    console.log(ajax.responseText)
                }
            }

            ajax.open("POST", "http://127.0.0.1:8000/api/clients/export", true)

            ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded")

            ajax.send(
                "from_date=" + date_range.from_date +
                "&to_date=" + date_range.to_date
            )
        }

    </script>

@endsection
