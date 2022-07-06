<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    // Patient
    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class, 'patient_id');
    }
    public function complaint()
    {
        return $this->hasOne(Complaint::class, 'patient_id');
    }
    public function patientAppointments()
    {
        return $this->belongsToMany(Appointment::class, 'complaint', 'patient_id')->using(Complaint::class)->as('complaints');
    }

    // Doctor
    public function doctorSchedules()
    {
        return $this->belongsToMany(Schedule::class, 'doctor_schedule', 'doctor_id')->using(DoctorSchedule::class)->as('schedules');
    }
    public function diagnose()
    {
        return $this->hasOne(Diagnose::class, 'doctor_id');
    }
    public function doctorAppointments()
    {
        return $this->belongsToMany(Appointment::class, 'diagnosis', 'doctor_id')->using(Diagnose::class)->as('diagnosis');
    }

    // Doctor Schedule
    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'doctor_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
