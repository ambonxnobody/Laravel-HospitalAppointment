@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi, {{ auth()->user()->name }}!</h1>
        {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Share
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Export
                </button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div> --}}
    </div>

    @can('patient')
        <h2>Dokter yang Tersedia</h2>
        <div class="row row-cols-1 row-cols-lg-3 g-4">
            @foreach ($doctors as $doctor)
                <div class="col">
                    <div class="card">
                        <div class="d-flex justify-content-center p-5">
                            <img src="https://ui-avatars.com/api/?name={{ $doctor->name }}&size=200&background=DC3545&color=fff"
                                class="align-center card-img-top img-fluid rounded-circle" alt="..." style="width: 150px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $doctor->name }}</h5>
                            <p class="card-text text-center">Email : {{ $doctor->email }}</p>
                            <p class="card-text text-center">Alamat : {{ $doctor->address }}</p>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo{{ $doctor->id }}" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Jadwal yang Tersedia
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo{{ $doctor->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <div class="list-group">
                                            @if ($doctor->doctorSchedules->count() > 0)
                                                @foreach ($doctor->doctorSchedules as $schedule)
                                                    <form action="/addAppointment/{{ $schedule->id }}/{{ $doctor->id }}"
                                                        method="POST">
                                                        @csrf
                                                        <button
                                                            onclick="return confirm('Apakah Anda Yakin Akan Menambahkan Appointment?')"
                                                            class="m-1 btn btn-outline-primary text-start" aria-current="true">
                                                            {{ $schedule->day }}, pukul {{ $schedule->startTime }} -
                                                            {{ $schedule->endTime }}
                                                        </button>
                                                    </form>
                                                @endforeach
                                            @else
                                                <p class="text-danger"><strong>Dokter ini tidak memiliki jadwal.</strong></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcan
    @can('doctor')
        <h2>Appointment Anda</h2>
        <h5 class="mt-3">Appointment Berlangsung</h5>
        <div class="table">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Dimulai</th>
                        <th class="text-center" scope="col">Berakhir</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($myAppointments->count() > 0)
                        @foreach ($myAppointments as $complaint)
                            @if ($complaint->appointment->status == 'pending')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($complaint->appointment->date)->isoFormat('dddd, D MMMM Y') }}
                                    </td>
                                    <td class="text-center">{{ $complaint->appointment->startTime }}</td>
                                    <td class="text-center">{{ $complaint->appointment->endTime }}</td>
                                    <td class="text-end">
                                        <a href="/diagnose/{{ $complaint->id }}/edit" class="btn btn-outline-warning">
                                            <span data-feather="file-text" class="align-text-center"></span> Diagnose
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">Anda Tidak Memiliki Appointment Minggu Ini.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <h5 class="mt-5">Appointment Selesai</h5>
        <div class="table">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Dimulai</th>
                        <th class="text-center" scope="col">Berakhir</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($myAppointments->count() > 0)
                        @foreach ($myAppointments as $complaint)
                            @if ($complaint->appointment->status == 'done')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($complaint->appointment->date)->isoFormat('dddd, D MMMM Y') }}
                                    </td>
                                    <td class="text-center">{{ $complaint->appointment->startTime }}</td>
                                    <td class="text-center">{{ $complaint->appointment->endTime }}</td>
                                    <td class="text-end">
                                        <a href="/complaint/{{ $complaint->id }}" class="btn btn-outline-primary">
                                            <span data-feather="eye" class="align-text-center"></span> Complaint
                                        </a>
                                        <a href="/diagnose/{{ $complaint->appointment->diagnose->id }}"
                                            class="btn btn-outline-primary">
                                            <span data-feather="eye" class="align-text-center"></span> Diagnose
                                        </a>
                                        {{-- <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="/appointment/{{ $complaint->appointment->id }}/edit">
                                                        <span data-feather="edit-2" class="align-text-center"></span> Ubah
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="/appointment/{{ $complaint->appointment->id }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            onclick="return confirm('Apakah Anda Yakin Akan Melakukan Aksi Ini?')"
                                                            class="dropdown-item">
                                                            <span data-feather="trash"></span> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">Anda Tidak Memiliki Appointment Sama Sekali.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <div class="table">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Dimulai</th>
                        <th class="text-center" scope="col">Berakhir</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($myAppointments->count() > 0)
                        @foreach ($myAppointments as $myAppointment)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($myAppointment->appointment->date)->isoFormat('dddd') }}</td>
                                <td class="text-center">{{ $myAppointment->appointment->startTime }}</td>
                                <td class="text-center">{{ $myAppointment->appointment->endTime }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge rounded-pill text-bg-{{ $myAppointment->appointment->status == 'pending' ? 'warning' : 'success' }}">
                                        {{ $myAppointment->appointment->status == 'pending' ? 'Menunggu' : 'Selesai' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="/diagnose/{{ $myAppointment->id }}/edit" class="btn btn-outline-warning">
                                        <span data-feather="file-text" class="align-text-center"></span> Diagnose
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Tidak Ada Appointment Untuk Anda Hari Ini.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="table mt-5">
            <table class="table table-striped table-sm align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Dimulai</th>
                        <th class="text-center" scope="col">Berakhir</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($myAppointments->count() > 0)
                        @foreach ($myAppointments as $myAppointment)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($myAppointment->appointment->date)->isoFormat('dddd') }}</td>
                                <td class="text-center">{{ $myAppointment->appointment->startTime }}</td>
                                <td class="text-center">{{ $myAppointment->appointment->endTime }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge rounded-pill text-bg-{{ $myAppointment->appointment->status == 'pending' ? 'warning' : 'success' }}">
                                        {{ $myAppointment->appointment->status == 'pending' ? 'Menunggu' : 'Selesai' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="/diagnose/{{ $myAppointment->id }}/edit" class="btn btn-outline-warning">
                                        <span data-feather="file-text" class="align-text-center"></span> Diagnose
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Tidak Ada Appointment Untuk Anda Hari Ini.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> --}}
    @endcan
@endsection
