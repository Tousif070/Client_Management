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
            'name' => 'required | min:3',
            'email' => 'required | email'
        ], [
            'name.required' => 'Please enter a name.',
            'name.min' => 'Name must contain at least 3 characters.',
            'email.required' => 'Please enter an email.',
            'email.email' => 'Please enter a valid email.'
        ]);

        $person = new Person;

        $person->name = $request->name;
        $person->email = $request->email;

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
            'name' => 'required | min:3',
            'email' => 'required | email'
        ], [
            'name.required' => 'Name can not be empty.',
            'name.min' => 'Name must contain at least 3 characters.',
            'email.required' => 'Please enter an email.',
            'email.email' => 'Please enter a valid email.'
        ]);

        $person = Person::find($person_id);

        $person->name = $request->name;
        $person->email = $request->email;

        $person->save();

        return redirect()->back()->withStatus('Office Member Updated Successfully !');
    }
}
