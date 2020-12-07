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

    public function removeMeeting($meeting_id)
    {
        $meeting = Meeting::find($meeting_id);

        $meeting->delete();

        return redirect()->back();
    }

    public function editMeetingView($meeting_id)
    {
        $meeting = Meeting::with('client')->find($meeting_id);

        return view('editmeeting', compact('meeting'));
    }

    public function editMeeting(Request $request, $meeting_id)
    {
        return "HAHAHAHAHA";

        //return redirect()->back()->withStatus('Source Updated Successfully !');
    }
}
