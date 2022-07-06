<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use RealRashid\SweetAlert\Facades\Alert;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Patient.MedicalHistory.Index', [
            'title' => 'Medical History',
            'medicalHistories' => MedicalHistory::where('patient_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Patient.MedicalHistory.Create', [
            'title' => 'Tambah Medical History',
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
        $validatedData = $request->validate([
            'condition' => 'required',
            'surgeries' => 'nullable',
            'medication' => 'nullable',
        ]);

        $validatedData['patient_id'] = auth()->user()->id;

        MedicalHistory::query()->create($validatedData);

        Alert::toast('Medical History Berhasil Ditambahkan!', 'success');

        return redirect('/medicalHistory');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalHistory $medicalHistory)
    {
        if ($medicalHistory->patient_id !== auth()->user()->id) {
            Alert::toast('Medical History Tidak Ditemukan!', 'error');
            return redirect('/medicalHistory');
        }
        return view('Pages.Patient.MedicalHistory.Edit', [
            'title' => 'Ubah Medical History',
            'medicalHistory' => $medicalHistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        if ($medicalHistory->patient_id !== auth()->user()->id) {
            Alert::toast('Medical History Tidak Ditemukan!', 'error');
            return redirect('/medicalHistory');
        }

        $validatedData = $request->validate([
            'condition' => 'required',
            'surgeries' => 'nullable',
            'medication' => 'nullable',
        ]);

        MedicalHistory::query()->where('id', $medicalHistory->id)->update($validatedData);

        Alert::toast('Medical History Berhasil Diubah!', 'success');

        return redirect('/medicalHistory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalHistory $medicalHistory)
    {
        if ($medicalHistory->patient_id !== auth()->user()->id) {
            Alert::toast('Medical History Tidak Ditemukan!', 'error');
            return redirect('/medicalHistory');
        }

        MedicalHistory::destroy($medicalHistory->id);

        Alert::toast('Medical History Berhasil Dihapus!', 'success');

        return redirect('/medicalHistory');
    }
}
