<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;

class ClientController extends Controller
{   

    public function index() {
        $services = Service::get()->toArray();
        
        return view('layouts.client.index', compact('services'));
    }
    

    public function book(Request $request) {
        // check if there is a same date service appointment

        $appointment = Appointment::where('scheduled_at', $request->scheduled_at)
        ->where('service_id', $request->service_option)
        ->get()
        ->toArray();

        if (sizeof($appointment) > 0) {
            session()->flash('message','Schedule is not available!');
            return redirect()->intended('/#book');
        } else {
            Appointment::insert([
                'user_id' => $request->user_id,
                'scheduled_at' => $request->scheduled_at,
                'status_id' => 1,
                'service_id' => $request->service_option,
            ]);
        }
        
        

        return redirect()->back();
    }
}
