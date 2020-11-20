<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    
    /**
     * Get the user record associated with the appointment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

   


      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status_id',
        'service_ids',
        'cost',
        'scheduled_at',
    ];



      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'service_ids' => 'array'
    ];

    // public function getScheduledAtAttribute($value) {
       
    //     return Carbon::create($value)->toDayDateTimeString();
    // }

    // public function getUpdatedAtAttribute($value) {
       
    //     return Carbon::create($value)->toDayDateTimeString();
    // }



}
