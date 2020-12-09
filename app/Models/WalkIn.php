<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkIn extends Model
{
    use HasFactory;

    protected $table = 'walk_in';


    public function appointment()
    {
        return $this->hasOne('App\Models\Appointment');
    }

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'contact_number'
    ];
}
