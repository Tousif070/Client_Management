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

    public function editPersonView($person_id)
    {
        $person = Person::find($person_id);

        return view('editperson', compact('person'));
    }

    public function editPerson(Request $request, $person_id)
    {
        $this->validate($request, [
            'name' => 'required | min:3'
        ], [
            'name.required' => 'Name can not be empty.',
            'name.min' => 'Name must contain at least 3 characters.'
        ]);

        $person = Person::find($person_id);

        $person->name = $request->name;

        $person->save();

        return redirect()->back()->withStatus('Office Member Updated Successfully !');
    }
}
