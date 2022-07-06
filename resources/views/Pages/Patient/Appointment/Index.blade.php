@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/" class="btn btn-outline-success">
            <span data-feather="plus" class="align-text-center"></span>
        </a>
    </div>
    <h5>Appointment Berlangsung</h5>
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
                @if ($complaints->count() > 0)
                    @foreach ($complaints as $complaint)
                        @if ($complaint->appointment->status == 'pending')
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td class="text-center">
                                    {{ Carbon\Carbon::parse($complaint->appointment->date)->isoFormat('dddd, D MMMM Y') }}
                                </td>
                                <td class="text-center">{{ $complaint->appointment->startTime }}</td>
                                <td class="text-center">{{ $complaint->appointment->endTime }}</td>
                                <td class="text-end">
                                    <a href="/complaint/{{ $complaint->id }}/edit" class="btn btn-outline-warning">
                                        <span data-feather="file-text" class="align-text-center"></span> Complaint
                                    </a>
                                    <form action="/appointment/{{ $complaint->appointment->id }}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Apakah Anda Yakin Akan Melakukan Aksi Ini?')"
                                            class="btn btn-outline-danger">
                                            <span data-feather="trash"></span>
                                        </button>
                                    </form>
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
                        <td class="text-center" colspan="6">Anda Belum Memiliki Appointment.</td>
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
                @if ($complaints->count() > 0)
                    @foreach ($complaints as $complaint)
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
                                    <a href="/diagnose/{{ $complaint->id }}" class="btn btn-outline-primary">
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
                        <td class="text-center" colspan="6">Anda Belum Memiliki Appointment.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
