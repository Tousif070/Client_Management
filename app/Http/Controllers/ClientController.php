<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Client, Source, Service, Person, LeadStatus};
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;
use App\Imports\ClientsImport;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['source', 'service', 'person', 'leadstatus'])->get();

        return view('clients', ['clients' => $clients, 'serial' => 0]);
    }

    public function addClientView()
    {
        return view('addclient', [
            'sources' => Source::all(),
            'services' => Service::all(),
            'persons' => Person::all(),
            'leadStatuses' => LeadStatus::all()
        ]);
    }

    public function addClient(Request $request)
    {
        $client = new Client;

        $client->name = $request->client_name;
        $client->company_name = $request->company_name;
        $client->conversion_date = $request->conversion_date;

        $client->contact_number = $request->contact_number;
        $client->email = $request->email;    
        $client->address = $request->address;

        $client->comment_1 = $request->comment_1;
        $client->comment_2 = $request->comment_2;

        $client->source_id = $request->source_id;
        $client->service_id = $request->service_id;
        $client->person_id = $request->assigned_person_id;
        $client->lead_status_id = $request->lead_status_id;
        
        $client->save();

        return redirect()->back();
    }




    public function uploadClients()
    {
        return view('uploadclients');
    }

    public function import(Request $request)
    {
        $file = $request->my_file->store('excel_import');

        Excel::import(new ClientsImport, $file);

        return redirect()->back()->withStatus('Excel File Uploaded Successfully !');
    }

    public function export()
    {
        $fileName = "Clients.xlsx";

        return Excel::download(new ClientsExport, $fileName);
    }
}
