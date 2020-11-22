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
}
