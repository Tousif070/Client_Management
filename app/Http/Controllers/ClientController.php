<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['source', 'person', 'service', 'leadstatus'])->get();

        dump($clients);
    }

    public function export()
    {
        $fileName = "Clients.xlsx";

        return Excel::download(new ClientsExport, $fileName);
    }
}
