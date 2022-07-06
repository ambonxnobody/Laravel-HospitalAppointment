<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Complaint extends Pivot
{

    protected $guarded = ['id'];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
