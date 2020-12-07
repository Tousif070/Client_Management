<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MeetingFormRequest;

use App\{Meeting, Client};

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with('client')->get();

        return view('meetings', ['meetings' => $meetings, 'serial' => 0]);
    }

    public function addMeetingView()
    {
        $clients = Client::all();

        return view('addmeeting', compact('clients'));
    }

    public function addMeeting(MeetingFormRequest $request)
    {
        $meeting = new Meeting;

        $meeting->title = $request->title;
        $meeting->agenda = $request->agenda;
        $meeting->client_id = $request->client_id;
        $meeting->date = $request->date;
        $meeting->time = $request->time;

        $meeting->save();

        return redirect()->back()->withStatus('Meeting Created Successfully !');
    }
}
