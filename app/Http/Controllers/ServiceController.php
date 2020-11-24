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

    public function addServiceView()
    {
        return view('addservice');
    }

    public function addService(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;

        $service->save();

        return redirect()->back();
    }

    public function removeService($service_id)
    {
        $service = Service::find($service_id);

        $service->delete();

        return redirect()->back();
    }
}
