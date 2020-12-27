@extends('layouts.baselayout')

@section('title', 'Create New Meeting')

@section('content')

    <div class="container mb-4">

        <div class="row">

            <h3 class="mb-4">Create New Meeting</h3>

        </div>

        <div class="row">

            @if(session('status'))

                <div class="alert alert-success col-sm-8" role="alert">

                    {{ session('status') }}

                </div>

            @endif

        </div>

        <div class="row">

            {{-- FORM STARTS HERE --}}

            <form class="col-sm-8" method="POST" action="{{ route('meeting.add.submit') }}">

                @csrf

                <div class="mb-3">
                    <span style="color: crimson; font-size: 18px;">*</span> - Required
                </div>




                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Client:
                    </label>

                    <div class="row">

                        <div class="col-4">

                            <input type="text" id="client_custom_id" name="client_custom_id" onkeyup="search(this.value)" value="{{ old('client_custom_id') }}" placeholder="Enter Client ID" class="form-control">

                        </div>

                        <div class="col-8">

                            <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" placeholder="Enter Client ID to see Client Name here" disabled style="font-weight: 500; background-color: white;" class="form-control">

                        </div>

                    </div>

                    <input type="hidden" id="client_id" name="client_id" value="{{ old('client_id') }}">

                    <div class="text-danger">{{ $errors->first('client_custom_id') }}</div>

                    @if(Session::has('error_client_custom_id'))

                        <div class="text-danger">

                            {{ Session::get('error_client_custom_id') }}

                        </div>

                    @endif

                </div>




                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Title:
                    </label>

                    <input type="text" name="title" value="{{ old('title') ? old('title') : Session::get('title') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('title') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Agenda:
                    </label>

                    <textarea name="agenda" class="form-control" rows="3">{{ old('agenda') ? old('agenda') : Session::get('agenda') }}</textarea>

                    <div class="text-danger">{{ $errors->first('agenda') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Date:
                    </label>

                    <input type="date" name="date" value="{{ old('date') ? old('date') : Session::get('date') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('date') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Time:
                    </label>

                    <input type="time" name="time" value="{{ old('time') ? old('time') : Session::get('time') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('time') }}</div>

                </div>





                <input type="submit" value="Create" class="btn btn-primary">





            </form>

            {{-- FORM ENDS HERE --}}

        </div>

    </div>


    <script>

        function search(text)
        {
            let ajax = new XMLHttpRequest()

            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    let client_name = document.getElementById("client_name")
                    let client_id = document.getElementById("client_id")
                    let client_custom_id = document.getElementById("client_custom_id")

                    let obj = JSON.parse(ajax.responseText);

                    if(obj.count == 1)
                    {
                        client_name.placeholder = obj.name
                        client_id.value = obj.id
                    }
                    else if(obj.count == 0)
                    {
                        client_id.value = "";

                        if(client_custom_id.value != "")
                        {
                            client_name.placeholder = obj.msg
                        }
                        else
                        {
                            client_name.placeholder = "Enter Client ID to see Client Name here"
                        }
                    }
                }
            }

            ajax.open("POST", "http://127.0.0.1:8000/api/meeting/check", true)

            ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded")

            ajax.send("custom_id=" + text)
        }

    </script>


@endsection
