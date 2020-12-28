<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MeetingFormRequest;
use App\Http\Requests\MeetingEditFormRequest;

use App\{Meeting, Client, Person, LeadStatus};

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with('client')->orderBy('date')->orderBy('time')->get();

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

        if($request->client_id != null)
        {
            $meeting->client_id = $request->client_id;
        }
        else
        {
            return redirect()->back()->with([
                'error_client_custom_id' => 'Please enter a valid client ID',
                'title' => $request->title,
                'agenda' => $request->agenda,
                'date' => $request->date,
                'time' => $request->time
            ]);
        }

        $meeting->date = $request->date;
        $meeting->time = $request->time;
        $meeting->status = "Pending";

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

        return view('editmeeting', [
            'meeting' => $meeting,
            'persons' => Person::all(),
            'leadStatuses' => LeadStatus::all()
        ]);
    }

    public function editMeeting(MeetingEditFormRequest $request, $meeting_id)
    {
        $meeting = Meeting::find($meeting_id);

        $client = Client::find($meeting->client->id);

        $meeting->title = $request->title;
        $meeting->agenda = $request->agenda;
        $meeting->date = $request->date;
        $meeting->time = $request->time;

        $client->person_id = $request->person_id;
        $client->lead_status_id = $request->lead_status_id;

        $meeting->save();

        $client->save();

        return redirect()->back()->withStatus('Meeting Updated Successfully !');
    }




    public function checkClient(Request $request)
    {
        $clients = Client::where('custom_id', '=', $request->custom_id)->get();

        if(count($clients) == 1)
        {
            return [
                'count' => 1,
                'name' => $clients[0]['name'],
                'id' => $clients[0]['id']
            ];
        }
        else if(count($clients) == 0)
        {
            return [
                'count' => 0,
                'msg' => 'Invalid ID, Client not found'
            ];
        }
    }
}
