<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeadStatus;

class LeadStatusController extends Controller
{
    public function index()
    {
        $leadStatuses = LeadStatus::all();

        return view('leadstatuses', ['leadStatuses' => $leadStatuses, 'serial' => 0]);
    }

    public function addLeadStatusView()
    {
        return view('addleadstatus');
    }

    public function addLeadStatus(Request $request)
    {
        $leadStatus = new LeadStatus;

        $leadStatus->name = $request->name;

        $leadStatus->save();

        return redirect()->back();
    }
}
