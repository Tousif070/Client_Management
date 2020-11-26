<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Document</title>

    <style>
        table {
            font-size: 14px;
        }

        input[type="text"], input[type="email"], select {
            height: 35px;
            background-color: aliceblue;
        }

        input[type="text"]:disabled {
            border: 0;
            font-weight: 500;
        }

        input[type="email"]:disabled {
            border: 0;
            font-weight: 500;
        }

        select:disabled {
            border: 0;
            font-weight: 500;
        }
    </style>


    <script>

        function change(id)
        {
            let edit_save_btn = document.getElementById(id)

            let elements = document.getElementsByClassName(id)

            if(edit_save_btn.innerHTML == "Edit")
            {
                edit_save_btn.innerHTML = "Save"

                for(let i = 0; i < elements.length; i++)
                {
                    elements[i].disabled = false;
                }
            }
            else if(edit_save_btn.innerHTML == "Save")
            {
                edit_save_btn.innerHTML = "Edit"

                for(let i = 0; i < elements.length; i++)
                {
                    elements[i].disabled = true;
                }

                let data = {
                    id:                  id,
                    client_name:         elements[0].value,
                    company_name:        elements[1].value,
                    conversion_date:     elements[2].value,
                    source_id:           elements[3].value,
                    assigned_person_id:  elements[4].value,
                    service_id:          elements[5].value,
                    contact_number:      elements[6].value,
                    email:               elements[7].value,
                    address:             elements[8].value,
                    lead_status_id:      elements[9].value,
                    comment_1:           elements[10].value,
                    comment_2:           elements[11].value
                }

                edit(data)
            }
        }



        function edit(data)
        {
            let ajax = new XMLHttpRequest()

            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200)
                {
                    console.log(ajax.responseText)
                }
            }

            ajax.open("POST", "http://127.0.0.1:8000/api/client/edit", true)

            ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");

            ajax.send(
                "id="                     + data.id +
                "&client_name="           + data.client_name +
                "&company_name="          + data.company_name +
                "&conversion_date="       + data.conversion_date +
                "&source_id="             + data.source_id +
                "&assigned_person_id="    + data.assigned_person_id +
                "&service_id="            + data.service_id +
                "&contact_number="        + data.contact_number +
                "&email="                 + data.email +
                "&address="               + data.address +
                "&lead_status_id="        + data.lead_status_id +
                "&comment_1="             + data.comment_1 +
                "&comment_2="             + data.comment_2
            )
        }

    </script>


</head>
<body>

    <div class="container-fluid">

        <div class="row">

            <h3>Clients</h3>

            <table class="table table-bordered table-hover table-sm">
        
                <thead class="thead-dark">
        
                    <tr>
                        <th>Sl. No.</th>
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

                            <td><input class="{{ $client->id }}" type="text" disabled name="client_name" value="{{ $client->name }}"></td>

                            <td><input class="{{ $client->id }}" type="text" disabled name="company_name" value="{{ $client->company_name }}"></td>

                            <td><input class="{{ $client->id }}" type="text" disabled name="conversion_date" value="{{ $client->conversion_date }}"></td>

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

                            <td><input class="{{ $client->id }}" type="text" disabled name="address" value="{{ $client->address }}"></td>

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

                            <td><input class="{{ $client->id }}" type="text" disabled name="comment_1" value="{{ $client->comment_1 }}"></td>

                            <td><input class="{{ $client->id }}" type="text" disabled name="comment_2" value="{{ $client->comment_2 }}"></td>


                            

                            <td><button id="{{ $client->id }}" onclick="change(this.id)" class="btn btn-success">Edit</button></td>
                            

                            <td>

                                <form method="POST" action="{{ route('client.remove', $client->id) }}">

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

</body>
</html>
