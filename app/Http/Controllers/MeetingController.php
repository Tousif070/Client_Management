<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with('client')->get();

        return view('meetings', ['meetings' => $meetings, 'serial' => 0]);
    }

    public function addMeetingView()
    {
        return view('addmeeting');
    }
}
