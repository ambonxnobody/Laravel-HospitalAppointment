<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Diagnose extends Pivot
{

    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
