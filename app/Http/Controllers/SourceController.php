<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Source;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::all();

        return view('sources', ['sources' => $sources, 'serial' => 0]);
    }

    public function addSourceView()
    {
        return view('addsource');
    }

    public function addSource(Request $request)
    {
        $source = new Source;

        $source->name = $request->name;

        $source->save();

        return redirect()->back();
    }
}
