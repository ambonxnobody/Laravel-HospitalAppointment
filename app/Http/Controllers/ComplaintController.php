<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('Pages.Patient.Complaint.Show', [
            'title' => 'Detail Complaint',
            'complaint' => $complaint,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        if ($complaint->patient_id !== auth()->user()->id) {
            Alert::toast('Appointment Tidak Ditemukan!', 'error');
            return redirect('/appointment');
        }
        return view('Pages.Patient.Complaint.Edit', [
            'title' => 'Complaint',
            'complaint' => $complaint,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        if ($complaint->patient_id !== auth()->user()->id) {
            Alert::toast('Appointment Tidak Ditemukan!', 'error');
            return redirect('/appointment');
        }

        $validatedData = $request->validate([
            'concerns' => 'required',
            'symptoms' => 'required',
        ]);

        Complaint::query()->where('id', $complaint->id)->update($validatedData);

        Alert::toast('Complaint Berhasil Ditambahkan!', 'success');

        return redirect('/appointment');
    }
}
