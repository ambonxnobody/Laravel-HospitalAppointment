<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Admin
        \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'gender' => 'M',
            'role' => 'admin',
        ]);

        // User Doctor
        \App\Models\User::factory()->create([
            'email' => 'doctor@gmail.com',
            'name' => 'Doctor',
            'gender' => 'M',
            'role' => 'doctor',
        ]);
        \App\Models\User::factory(4)->create([
            'role' => 'doctor',
        ]);

        // User Patient
        \App\Models\User::factory()->create([
            'email' => 'patient@gmail.com',
            'name' => 'Patient',
            'gender' => 'M',
            'role' => 'patient',
        ]);
        \App\Models\User::factory(9)->create([
            'role' => 'patient',
        ]);

        // Schedule
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '12:00:00',
            'day' => 'Senin',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '12:00:00',
            'day' => 'Selasa',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '12:00:00',
            'day' => 'Rabu',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '12:00:00',
            'day' => 'Kamis',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '11:00:00',
            'day' => 'Jumat',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '08:00:00',
            'endTime' => '20:00:00',
            'breakTime' => '12:00:00',
            'day' => 'Sabtu',
        ]);
        \App\Models\Schedule::query()->create([
            'startTime' => '15:00:00',
            'endTime' => '20:00:00',
            'day' => 'Minggu',
        ]);

        // Doctor Schedule
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 2,
            'schedule_id' => 1,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 2,
            'schedule_id' => 3,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 2,
            'schedule_id' => 5,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 2,
            'schedule_id' => 7,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 3,
            'schedule_id' => 2,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 3,
            'schedule_id' => 4,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 3,
            'schedule_id' => 6,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 4,
            'schedule_id' => 4,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 5,
            'schedule_id' => 5,
        ]);
        \App\Models\DoctorSchedule::query()->create([
            'doctor_id' => 6,
            'schedule_id' => 6,
        ]);
    }
}
