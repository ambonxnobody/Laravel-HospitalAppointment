@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/" class="btn btn-outline-primary me-3">
            <span data-feather="chevron-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ \Carbon\Carbon::parse($diagnose->appointment->date)->isoFormat('dddd, d MMMM Y') }}
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">Nama Dokter : {{ $diagnose->doctor->name }}</h6>
            <p class="card-text">Diagnosa : {{ $diagnose->diagnosis }}</p>
            <p class="card-text">Resep Obat : {{ $diagnose->prescription }}</p>
        </div>
    </div>
@endsection
