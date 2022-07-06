<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }

    public function diagnose()
    {
        return $this->hasOne(Diagnose::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(User::class, 'diagnosis', 'appointment_id', 'doctor_id')->using(Diagnose::class)->as('doctors');
    }

    public function patients()
    {
        return $this->belongsToMany(User::class, 'complaint', 'appointment_id', 'patient_id')->using(Complaint::class)->as('patients');
    }
}
