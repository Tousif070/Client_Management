<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <div class="container mb-4">

        <div class="row">

            <h3 class="mb-4">Add New Client</h3>

        </div>

        <div class="row">

            {{-- FORM STARTS HERE --}}

            <form method="POST" action="{{ route('add.client.submit') }}">

                @csrf

                <div class="form-group">

                    <label>Client Name:</label>

                    <input type="text" name="client_name" class="form-control">

                </div>

                <div class="form-group">

                    <label>Company Name:</label>

                    <input type="text" name="company_name" class="form-control">

                </div>

                <div class="form-group">

                    <label>Conversion Date:</label>

                    <input type="text" name="conversion_date" class="form-control">

                </div>

                <div class="form-group">

                    <label>Source:</label>

                    <select class="form-control" name="source_id">

                        <option selected disabled>Select</option>

                        @foreach($sources as $source)

                        <option value="{{ $source->id }}">{{ $source->name }}</option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label>Assigned Person:</label>

                    <select class="form-control" name="assigned_person_id">

                        <option selected disabled>Select</option>

                        @foreach($persons as $person)

                        <option value="{{ $person->id }}">{{ $person->name }}</option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label>Service Requirement:</label>

                    <select class="form-control" name="service_id">

                        <option selected disabled>Select</option>

                        @foreach($services as $service)

                        <option value="{{ $service->id }}">{{ $service->name }}</option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label>Contact Number:</label>

                    <input type="text" name="contact_number" class="form-control">

                </div>

                <div class="form-group">

                    <label>Email:</label>

                    <input type="email" name="email" class="form-control">

                </div>

                <div class="form-group">

                    <label>Address:</label>

                    <textarea name="address" class="form-control" rows="3"></textarea>

                </div>

                <div class="form-group">

                    <label>Lead Status:</label>

                    <select class="form-control" name="lead_status_id">

                        <option selected disabled>Select</option>

                        @foreach($leadStatuses as $leadStatus)

                        <option value="{{ $leadStatus->id }}">{{ $leadStatus->name }}</option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group">

                    <label>Comment-1:</label>

                    <textarea name="comment_1" class="form-control" rows="3"></textarea>

                </div>

                <div class="form-group">

                    <label>Comment-2:</label>

                    <textarea name="comment_2" class="form-control" rows="3"></textarea>

                </div>





                <input type="submit" value="Add" class="btn btn-primary">





            </form>

            {{-- FORM ENDS HERE --}}

        </div>

    </div>

</body>
</html>
