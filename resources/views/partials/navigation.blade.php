<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">

    <span class="navbar-brand mr-5">Client Management</span>

    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Client
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('clients') }}">Client List</a>

                <a class="dropdown-item" href="{{ route('client.search') }}">Search Client</a>

                <a class="dropdown-item" href="{{ route('client.add') }}">Add Client</a>

                <a class="dropdown-item" href="{{ route('clients.upload') }}">Import Clients</a>

            </div>

        </li>

    </ul>


    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Meeting
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('meetings') }}">Meeting List</a>

                <a class="dropdown-item" href="{{ route('meeting.add') }}">Create Meeting</a>

            </div>

        </li>

    </ul>


    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Service
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('services') }}">Service List</a>

                <a class="dropdown-item" href="{{ route('service.add') }}">Add Service</a>

            </div>

        </li>

    </ul>


    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Office Member
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('persons') }}">Member List</a>

                <a class="dropdown-item" href="{{ route('person.add') }}">Add Member</a>

            </div>

        </li>

    </ul>


    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Source
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('sources') }}">Source List</a>

                <a class="dropdown-item" href="{{ route('source.add') }}">Add Source</a>

            </div>

        </li>

    </ul>


    <ul class="navbar-nav mr-4">

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lead Status
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ route('leadstatuses') }}">Status List</a>

                <a class="dropdown-item" href="{{ route('leadstatus.add') }}">Add Status</a>

            </div>

        </li>

    </ul>

</nav>
