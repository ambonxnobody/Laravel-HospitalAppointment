<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Models\Schedule;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Doctor.DoctorSchedule.Index', [
            'title' => 'My Schedule',
            'mySchedules' => DoctorSchedule::where('doctor_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Doctor.DoctorSchedule.Create', [
            'title' => 'Tambah Schedule',
            'schedules' => Schedule::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData['schedule_id'] = $request->schedule_id;

        $validatedData['doctor_id'] = auth()->user()->id;

        DoctorSchedule::query()->create($validatedData);

        Alert::toast('Schedule Berhasil Ditambahkan!', 'success');

        return redirect('/mySchedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $mySchedule)
    {
        if ($mySchedule->doctor_id !== auth()->user()->id) {
            Alert::toast('Schedule Tidak Ditemukan!', 'error');
            return redirect('/mySchedule');
        }

        DoctorSchedule::destroy($mySchedule->id);

        Alert::toast('Schedule Berhasil Dihapus!', 'success');

        return redirect('/mySchedule');
    }
}
