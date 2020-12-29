<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientFormRequest;

use App\{Client, Source, Service, Person, LeadStatus};

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;
use App\Imports\ClientsImport;

use Carbon\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['source', 'service', 'person', 'leadstatus'])->orderBy('conversion_date')->get();

        return view('clients', [
            'clients' => $clients,
            'serial' => 0,
            'sources' => Source::all(),
            'services' => Service::all(),
            'persons' => Person::all(),
            'leadStatuses' => LeadStatus::all()
        ]);
    }

    public function filterClients(Request $request)
    {
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required'
        ]);

        $clients = Client::whereBetween('conversion_date', [$request->from_date, $request->to_date])
                                ->with(['source', 'service', 'person', 'leadstatus'])
                                ->orderBy('conversion_date')
                                ->get();

        return view('clients', [
            'clients' => $clients,
            'serial' => 0,
            'sources' => Source::all(),
            'services' => Service::all(),
            'persons' => Person::all(),
            'leadStatuses' => LeadStatus::all(),

            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ]);
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

    public function addClient(ClientFormRequest $request)
    {
        $client = new Client;

        $today = Carbon::today('Asia/Dhaka');

        $client->custom_id = "CL-".$today->day;

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

        $client->custom_id = $client->custom_id.$client->id;

        $client->save();

        return redirect()->back()->withStatus('Client Added Successfully !');
    }

    public function removeClient($client_id)
    {
        $client = Client::find($client_id);

        $client->delete();

        return redirect()->back();
    }

    public function editClient(Request $request)
    {
        $client = Client::find($request->id);

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

        return "Updated Successfully !";
    }




    public function uploadClients()
    {
        return view('uploadclients');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'my_file' => 'required | mimes:xls,xlsx'
        ], [
            'my_file.required' => 'Please choose a file to upload.',
            'my_file.mimes' => 'File type must be of xlsx or xls.'
        ]);

        $file = $request->my_file->store('excel_import');

        Excel::import(new ClientsImport, $file);

        return redirect()->back()->withStatus('Excel File Uploaded Successfully !');
    }

    public function export(Request $request)
    {
        $fileName = "Clients.xlsx";

        return Excel::download(new ClientsExport($request->from_date, $request->to_date), $fileName);
    }
}
