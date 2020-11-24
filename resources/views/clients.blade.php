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
    </style>

</head>
<body>

    <div class="container-fluid">

        <div class="row">

            <h3>Clients</h3>

            <table class="table table-bordered table-hover table-sm">
        
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
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($clients as $client)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->conversion_date }}</td>
                            <td>{{ $client->source->name }}</td>
                            <td>{{ $client->person->name }}</td>
                            <td>{{ $client->service->name }}</td>
                            <td>{{ $client->contact_number }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ $client->leadstatus->name }}</td>
                            <td>{{ $client->comment_1 }}</td>
                            <td>{{ $client->comment_2 }}</td>

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
