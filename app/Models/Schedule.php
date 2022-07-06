<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function doctors()
    {
        return $this->belongsToMany(User::class, 'doctor_schedule', 'schedule_id', 'doctor_id')->using(DoctorSchedule::class)->as('doctors');
    }

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }
}
