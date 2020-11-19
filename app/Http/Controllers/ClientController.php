<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;

class ClientController extends Controller
{
    public function index() {
        $services = Service::get()->toArray();
        
        return view('layouts.client._index', compact('services'));
    }
    

    public function book(Request $request) {
        $arrayToString = implode(',', $request->input('service_option'));
        $serviceIds = $arrayToString;

        $serviceCost = Service::whereIn('id', $request->input('service_option'))->sum('cost');
        
        Appointment::insert([
            'user_id' => $request->user_id,
            'scheduled_at' => $request->scheduled_at,
            'status_id' => 1,
            'service_ids' => $serviceIds,
            'cost' => $serviceCost
        ]);

        return redirect()->back();
    }
}
