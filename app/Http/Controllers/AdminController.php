<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    private function getAppointments() {
        $appointments = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->get(['firstname', 'lastname', 'email', 'scheduled_at'])
        ->toArray();

        return $appointments;
    }

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
      ->where('status_id', 2)
      ->orderBy('scheduled_at', 'asc')
      ->get(['firstname', 'lastname', 'email', 'scheduled_at'])
      ->toArray();
       
        return view('layouts.admin.appointment', compact('appointments'));
    }

    public function getServices() {
        $services = Service::get()->toArray();

       return view('layouts.admin.services', compact('services'));
    }
}
