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
        // $this->middleware('auth');
        $this->middleware('role');
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
        ->where('status_id', 'not like', '%1%')
        ->get(['firstname', 'lastname', 'email', 'scheduled_at', 'status_id'])
        ->toArray();
        $this->getAppointmentCount();
        return $appointments;
    }


    private function getAppointmentCount() {
        $dateNow = $this->getTime();

        $taskToday = Appointment::where('status_id', 2)
        ->where('scheduled_at', '<=', $dateNow['to'])
        ->count();

        $ongoing = Appointment::where('status_id', 2)
        ->where('scheduled_at', '<=', $dateNow['from'])
        ->count();

        $served = Appointment::where('status_id', 3)
        ->whereBetween('updated_at', $dateNow)
        ->count();

        return $appointmentCount = [
            'taskToday' => $taskToday,
            'ongoing' => $ongoing,
            'served' => $served,
        ];
    }

    public function index() {
    
        $calendarData = $this->getAppointments();
        $appointmentCount = $this->getAppointmentCount();

        $responseData = [
            'calendarData' => $calendarData,
            'appointmentCount' =>  $appointmentCount
        ];

        return view('layouts.admin.dashboard', compact('responseData'));
    }

    public function getAppointment() {
        $appointments = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->where('status_id', 1)
        ->orderBy('scheduled_at', 'asc')
        ->get(['appointments.id', 'firstname', 'lastname', 'email', 'contact_number', 'scheduled_at'])
        ->toArray();
        
        return view('layouts.admin.appointment', compact('appointments'));
    }

    public function confirmOrDelete(Request $request) {

        $idParam = explode(' ', $request->route('appointment_id'));

        // check if appointmens exists
        $appointment = Appointment::find($idParam[1]);
        
        if ($idParam[0] == 'confirm') {
            $appointment->status_id = 2;
            $appointment->save();
        } 
        else if ($idParam[0] == 'cancel') {
            $appointment->delete();
        }

        return redirect()->back();
    }

    public function getServices() {
        $services = Service::get()->toArray();
        return view('layouts.admin.services', compact('services'));
    }

    public function showTaskToday() {
        $dateNow = $this->getTime();

        $fields = [
            'appointments.id',
            'firstname',
            'lastname',
            'email',
            'scheduled_at',
            'service_ids',
        ];

        $taskToday = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->where('status_id', 2)
        ->where('scheduled_at', '<=', $dateNow['to'])
        ->get($fields)
        ->toArray();

       return view('layouts.admin.showTaskToday', compact('taskToday'));
    }

    public function showOngoingTask() {
        $dateNow = $this->getTime();

        $fields = [
            'appointments.id',
            'firstname',
            'lastname',
            'email',
            'scheduled_at',
            'service_ids',
        ];

        $ongoingTasks = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->where('status_id', '=', 2)
        ->where('scheduled_at', '<=', $dateNow['from'])
        ->get($fields)
        ->toArray();

        

        return view('layouts.admin.showOngoingTask', compact('ongoingTasks'));
    }

    public function showServedTask() {

        $dateNow = $this->getTime();

        $fields = [
            'user_id',
            'firstname',
            'lastname',
            'email',
            'service_ids',
            'status_id',
            'scheduled_at',
            'appointments.updated_at',
        ];

       
        $servedTask = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->where('status_id', 3)
        ->whereBetween('appointments.updated_At', $dateNow)
        ->get($fields)
        ->toArray();

        return view('layouts.admin.showServedTask', compact('servedTask'));
    }

    public function updateTask(Request $request) {

        $id = $request['appointment_id'];
        $appointment = Appointment::find($id);
        $appointment->status_id = 3;
        $appointment->save();
        
        return redirect()->back();
    }
}
