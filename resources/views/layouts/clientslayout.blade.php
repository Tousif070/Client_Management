<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>@yield('title', 'Client Management')</title>

    <style>

        table {
            font-size: 14px;
        }

        td {
            background-color: white;
        }

        input[type="text"], input[type="date"]:disabled, input[type="email"], select {
            height: 35px;
            background-color: white;
        }

        textarea {
            background-color: white;
        }

        input[type="text"]:disabled, input[type="date"]:disabled, input[type="email"]:disabled, select:disabled, textarea:disabled {
            border: 0;
            font-weight: 500;
            opacity: 1.0;
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
                edit_save_btn.classList.remove("btn-info")
                edit_save_btn.classList.add("btn-success")

                for(let i = 0; i < elements.length; i++)
                {
                    elements[i].disabled = false;
                }
            }
            else if(edit_save_btn.innerHTML == "Save")
            {
                edit_save_btn.innerHTML = "Edit"
                edit_save_btn.classList.remove("btn-success")
                edit_save_btn.classList.add("btn-info")

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

            ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded")

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

    @include('partials.navigation')

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
