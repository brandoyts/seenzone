<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Appointment;

class ClientController extends Controller
{   

    public function index() {
        $services = Service::get();
        $appointments = Appointment::where('user_id', Auth::id())
        ->join('services', 'services.id', '=', 'appointments.service_id')
        ->join('status', 'status.id', '=', 'appointments.status_id')
        ->get();

        $responseData = [
            'services' => $services,
            'appointmentHistory' => $appointments,
        ];


        return view('layouts.client.index', compact('responseData'));
    }
    

    public function book(Request $request) {
        // check if there is a same date service appointment
        $appointment = Appointment::where('scheduled_at', $request->scheduled_at)
        ->where('service_id', $request->service_option)
        ->get()
        ->toArray();

        if (sizeof($appointment) > 0) {
            session()->flash('message-fail','Schedule is not available. Try a different schedule!');
            
        } else {
            session()->flash('message-success','Appointment submitted successfully. Wait for the confirmation');
            Appointment::insert([
                'user_id' => $request->user_id,
                'scheduled_at' => $request->scheduled_at,
                'status_id' => 1,
                'service_id' => $request->service_option,
                'plate_number' => $request->plate_number
            ]);

        }
        return redirect()->intended('/#contact');
    }

   
}
