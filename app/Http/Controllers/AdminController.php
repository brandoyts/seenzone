<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    private function getTime() {
        $now = Carbon::now()->toDateTimeString();
        $currentDate = explode(" ", $now)[0];

        $from = $currentDate. ' ' .'00:00:00';
        $to = $currentDate. ' '.'23:59:59';

        return [
            'from' => $from,
            'to' => $to
        ];
    }

    private function getAppointments() {
       
        $dateNow = $this->getTime();
    
        $appointments = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->get(['firstname', 'lastname', 'email', 'scheduled_at'])
        ->toArray();

        return $appointments;
    }

    private function getOngoing() {
        $dateNow = $this->getTime();

        $appointments = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->whereIn('scheduled_at', $dateNow)
        ->where('scheduled_at', '>', $dateNow['from'])
        ->get(['firstname', 'lastname', 'email', 'scheduled_at'])
        ->toArray();
    }

    // private function getAppointmentCount() {
    //     $appointmentCount = DB::table('appointments')
    //     ->whereIn();
    // }

    public function index() {
       $isAdmin = Auth::user()->role_id == 1;
       
        if ($isAdmin) {
            $data = $this->getAppointments();

            // dd($data);

            return view('layouts.admin.dashboard', compact('data'));
        } else {
            return redirect('/');
        }

    }

    public function getAppointment() {
        $appointments = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->where('status_id', 1)
        ->orderBy('scheduled_at', 'asc')
        ->get(['firstname', 'lastname', 'email', 'contact_number', 'scheduled_at'])
        ->toArray();
        
        return view('layouts.admin.appointment', compact('appointments'));
    }

    public function getServices() {
        $services = Service::get()->toArray();

       return view('layouts.admin.services', compact('services'));
    }
}
