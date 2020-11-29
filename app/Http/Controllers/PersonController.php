<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();

        return view('persons', ['persons' => $persons, 'serial' => 0]);
    }

    public function addPersonView()
    {
        return view('addperson');
    }

    public function addPerson(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | min:3'
        ], [
            'name.required' => 'Please enter a name.',
            'name.min' => 'Name must contain at least 3 characters.'
        ]);

        $person = new Person;

        $person->name = $request->name;

        $person->save();

        return redirect()->back()->withStatus('Office Member Added Successfully !');
    }

    public function removePerson($person_id)
    {
        $person = Person::find($person_id);

        $person->delete();

        return redirect()->back();
    }
}
