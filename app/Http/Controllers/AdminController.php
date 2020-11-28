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
        ->get(['firstname', 'lastname', 'email', 'scheduled_at', 'status_id', 'contact_number'])
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
        ->join('services', 'services.id', '=', 'appointments.service_id')
        ->where('status_id', 1)
        ->orderBy('scheduled_at', 'asc')
        ->get(['appointments.id', 'firstname', 'lastname', 'email', 'contact_number', 'scheduled_at', 'services.service', 'services.cost', 'contact_number'])
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
            'services.service',
            'services.cost',
            'contact_number'
        ];

        $taskToday = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'services.id', '=', 'appointments.service_id')
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
            'services.service',
            'services.cost',
            'contact_number'
        ];

        $ongoingTasks = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'services.id', '=', 'appointments.service_id')
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
            'status_id',
            'scheduled_at',
            'services.service',
            'services.cost',
            'appointments.updated_at',
            'contact_number'
        ];

       
        $servedTask = Appointment::join('users', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'services.id', '=', 'appointments.service_id')
        ->where('status_id', 3)
        ->whereBetween('appointments.updated_At', $dateNow)
        ->get($fields)
        ->toArray();

       


        return view('layouts.admin.showServedTask', compact('servedTask'));
    }

    // mark as served
    public function updateTask(Request $request) {

        $id = $request['appointment_id'];
        $appointment = Appointment::find($id);
        $appointment->status_id = 3;
        $appointment->save();
        
        return redirect()->back();
    }

    public function viewReports(Request $request) {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
		Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $now = Carbon::now();

        $date = $request->date_range ? $request->date_range : 'current_day';
       

        if ($request->date_custom_from && $request->date_custom_from) {
            $date_from = $request->date_custom_from;
            $date_to = $request->date_custom_to;
        } 
        
        else {
            switch ($date) {
                case is_array($date):
                    $date_from = $date['date_from'];
                    $date_to = $date['date_to'];
                    break;
                case 'current_day':
                    $date_from = $now->startOfDay()->toDateTimeString();
                    $date_to = $now->endOfDay()->toDateTimeString();
                    break;
                case 'current_week':
                    $date_from = $now->startOfWeek()->toDateTimeString();
                    $date_to = $now->endOfWeek()->toDateTimeString();
                    break;
                case 'current_month':
                    $date_from = $now->startOfMonth()->toDateTimeString();
                    $date_to = $now->endOfMonth()->toDateTimeString();
                    break;
                case 'current_year':
                    $date_from = $now->startOfYear()->toDateTimeString();
                    $date_to = $now->endOfYear()->toDateTimeString();
                    break;
            }
        }
        
        $date_filter = [$date_from, $date_to];
        $service_filter = $request->service_select;

        $services = Service::get()->toArray();

        $servedTasks = DB::table('appointments')
        ->select(['appointments.id', 'firstname', 'lastname', 'email', 'contact_number', 'service', 'cost', 'scheduled_at', 'appointments.updated_at'])
        ->when($date_filter, function ($query, $date_filter) {
            if (in_array(null, $date_filter, true)) {
                return false;
            }
            return $query->whereBetween('appointments.updated_at', [$date_filter[0],$date_filter[1]]);
        })
        ->when($service_filter, function($query, $service_filter) {
            if (in_array(null, $service_filter, true)) {
                return false;
            }

            return $query->whereIn('appointments.service_id', $service_filter);
        })
        ->where('status_id', 3)
        ->join('users', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'services.id', '=', 'appointments.service_id')
        ->get();

        
        $total_sales = 0;

        if ($servedTasks) {
            foreach ($servedTasks as $task) {
                $total_sales += $task->cost;
            }
        }

        $total_sales = '₱ ' . number_format($total_sales, 2);
       

        $responseData = [
            'servedTasks' => $servedTasks,
            'services' => $services,
            'sales' => $total_sales
        ];



        return view('layouts.admin.showReports', compact('responseData'));
    }
}
