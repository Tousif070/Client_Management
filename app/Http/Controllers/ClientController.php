<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['source', 'person', 'service', 'leadstatus'])->get();

        dump($clients);
    }

    public function export()
    {

    }
}
