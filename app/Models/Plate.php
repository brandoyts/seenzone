<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }


    protected $fillable = [
        'user_id',
        'plate_number',
    ];
}
