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
       
       

        Appointment::insert([
            'user_id' => $request->user_id,
            'scheduled_at' => $request->scheduled_at,
            'status_id' => 2,
            'service_ids' => 2,
            'cost' => 300
        ]);

        return redirect()->back();
    }
}
