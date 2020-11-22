<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services', ['services' => $services, 'serial' => 0]);
    }
}
