<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Complaint;
use App\Models\Diagnose;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $appointment = Appointment::query()->where('date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        // Complaint::query()->where('appointment_id', $appointment->id)->delete();
        // Diagnose::query()->where('appointment_id', $appointment->id)->delete();
        // $appointment->delete();
        \App\Models\Appointment::query()->where('date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'done']); // Sementara

        return view('Pages.Patient.Appointment.Index', [
            'title' => 'Appointment',
            'complaints' => Complaint::query()->where('patient_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Schedule $schedule, User $doctor)
    {
        $time = $schedule->startTime;
        $startTime = $time;

        // Appointment Limitation
        $appointments = Appointment::all();
        foreach ($appointments as $appointment) {
            if ($appointment->complaint->patient_id == auth()->user()->id && $appointment->diagnose->doctor_id == $doctor->id) { // Use Date Limitation Instead!!! Maybe???
                Alert::toast('Appointment Sudah Ada!', 'error');
                return redirect('/appointment');
            }

            // Start Time Appointment Limitation
            if ($time == $appointment->startTime || \Carbon\Carbon::parse($appointment->date)->isoFormat('dddd') == $schedule->day && $appointment->diagnose->doctor_id == $doctor->id) {
                $startTime = \Carbon\Carbon::parse($time)->addHour(1);
                $time = \Carbon\Carbon::parse($time)->addHour(1);
            }
            // if ($$appointment->startTime == $schedule->breakTime) {
            //     $startTime = \Carbon\Carbon::parse($time)->addHour(1);
            // }
        }

        // Start Date Input from Day Algorithm
        $day = $schedule->day;

        $days = [
            \Carbon\Carbon::now()->addDays(1),
            \Carbon\Carbon::now()->addDays(2),
            \Carbon\Carbon::now()->addDays(3),
            \Carbon\Carbon::now()->addDays(4),
            \Carbon\Carbon::now()->addDays(5),
            \Carbon\Carbon::now()->addDays(6),
            \Carbon\Carbon::now()->addDays(7),
        ];

        for ($i = 0; $i < 7; $i++) {
            if (\Carbon\Carbon::parse($days[$i])->isoFormat('dddd') == $day) {
                $date = $days[$i]->format('Y-m-d');
            }
        }
        // End Date Input from Day Algorithm

        // Start Inputting to Appointment, Complaint, and Diagnose Table
        $appointment = Appointment::query()->create([
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => \Carbon\Carbon::parse($startTime)->addHour(),
            'status' => 'pending',
        ]);

        Complaint::query()->create([
            'patient_id' => auth()->user()->id,
            'appointment_id' => $appointment->id,
        ]);

        Diagnose::query()->create([
            'doctor_id' => $doctor->id,
            'appointment_id' => $appointment->id,
        ]);
        // End Inputting to Appointment, Complaint, and Diagnose Table

        Alert::toast('Appointment Berhasil Ditambahkan!', 'success');

        return redirect('/appointment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        if ($appointment->complaint->patient_id !== auth()->user()->id) {
            Alert::toast('Appointment Tidak Ditemukan!', 'error');
            return redirect('/appointment');
        }

        Appointment::destroy($appointment->id);

        Alert::toast('Appointment Berhasil Dihapus!', 'success');

        return redirect('/appointment');
    }
}
