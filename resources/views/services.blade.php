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

    <div class="container">

        <div class="row">

            <h3>Services</h3>

            <table class="table">
        
                <thead>
        
                    <tr>
                        <th>Sl. No.</th>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
        
                </thead>
        
                <tbody>
    
                    @foreach($services as $service)
        
                        <tr>
                            <td>{{ ++$serial }}</td>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                        </tr>
        
                    @endforeach
        
                </tbody>
        
            </table>

        </div>

    </div>

</body>
</html>
