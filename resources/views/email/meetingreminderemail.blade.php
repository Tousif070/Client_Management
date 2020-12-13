<html>
    <head>
        <style>
            * {
                font-family: "Segoe UI";
            }
        </style>
    </head>

    <body>
        <h2>
            Hello Mr. {{ $meeting->client->person->name }}
        </h2>

        <h2>

            @if($value == 1)
                You have a meeting with {{ $meeting->client->name }} tomorrow {{ date_format(date_create($meeting->date), 'l, F d') }} at {{ date_format(date_create($meeting->time), 'h:i A') }}.
            @elseif($value == 2)
                You have a meeting with {{ $meeting->client->name }} today at {{ date_format(date_create($meeting->time), 'h:i A') }}.
            @endif

        </h2>

        <h3>Meeting Title:</h3>
        {{ $meeting->title }}

        <h3>Agenda:</h3>
        {{ $meeting->agenda }}
    </body>
</html>