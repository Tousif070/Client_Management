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
}
