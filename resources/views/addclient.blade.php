@extends('layouts.baselayout')

@section('title', 'Add New Client')

@section('content')

    <div class="container mb-4">

        <div class="row">

            <h3 class="mb-4">Add New Client</h3>

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

            <form class="col-sm-8" method="POST" action="{{ route('client.add.submit') }}">

                @csrf

                <div class="mb-3">
                    <span style="color: crimson; font-size: 18px;">*</span> - Required
                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Client Name:
                    </label>

                    <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('client_name') }}</div>

                </div>

                <div class="form-group">

                    <label>Company Name:</label>

                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('company_name') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Conversion Date:
                    </label>

                    <input type="date" name="conversion_date" value="{{ old('conversion_date') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('conversion_date') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Source:
                    </label>

                    <select class="form-control" name="source_id">

                        <option selected disabled>Select</option>

                        @foreach($sources as $source)

                        <option value="{{ $source->id }}" {{ old('source_id') == $source->id ? "selected" : "" }}>{{ $source->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('source_id') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Assigned Person:
                    </label>

                    <select class="form-control" name="assigned_person_id">

                        <option selected disabled>Select</option>

                        @foreach($persons as $person)

                        <option value="{{ $person->id }}" {{ old('assigned_person_id') == $person->id ? "selected" : "" }}>{{ $person->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('assigned_person_id') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Service Requirement:
                    </label>

                    <select class="form-control" name="service_id">

                        <option selected disabled>Select</option>

                        @foreach($services as $service)

                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? "selected" : "" }}>{{ $service->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('service_id') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Phone Number (Mobile):
                    </label>

                    <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('contact_number') }}</div>

                </div>

                <div class="form-group">

                    <label>Email:</label>

                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">

                    <div class="text-danger">{{ $errors->first('email') }}</div>

                </div>

                <div class="form-group">

                    <label>Address:</label>

                    <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>

                    <div class="text-danger">{{ $errors->first('address') }}</div>

                </div>

                <div class="form-group">

                    <label>
                        <span style="color: crimson; font-size: 18px;">*</span>
                        Lead Status:
                    </label>

                    <select class="form-control" name="lead_status_id">

                        <option selected disabled>Select</option>

                        @foreach($leadStatuses as $leadStatus)

                        <option value="{{ $leadStatus->id }}" {{ old('lead_status_id') == $leadStatus->id ? "selected" : "" }}>{{ $leadStatus->name }}</option>

                        @endforeach

                    </select>

                    <div class="text-danger">{{ $errors->first('lead_status_id') }}</div>

                </div>

                <div class="form-group">

                    <label>Comment-1:</label>

                    <textarea name="comment_1" class="form-control" rows="3">{{ old('comment_1') }}</textarea>

                    <div class="text-danger">{{ $errors->first('comment_1') }}</div>

                </div>

                <div class="form-group">

                    <label>Comment-2:</label>

                    <textarea name="comment_2" class="form-control" rows="3">{{ old('comment_2') }}</textarea>

                    <div class="text-danger">{{ $errors->first('comment_2') }}</div>

                </div>





                <input type="submit" value="Add" class="btn btn-primary">





            </form>

            {{-- FORM ENDS HERE --}}

        </div>

    </div>

@endsection
