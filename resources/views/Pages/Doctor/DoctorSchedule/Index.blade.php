@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/mySchedule/create" class="btn btn-outline-success">
            <span data-feather="plus" class="align-text-center"></span>
        </a>
    </div>
    <div class="table">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Hari</th>
                    <th class="text-center" scope="col">Mulai</th>
                    <th class="text-center" scope="col">Istirahat</th>
                    <th class="text-center" scope="col">Berakhir</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if ($mySchedules->count() > 0)
                    @foreach ($mySchedules as $mySchedule)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{ $mySchedule->schedule->day }}</td>
                            <td class="text-center">{{ $mySchedule->schedule->startTime }}</td>
                            <td class="text-center">{{ $mySchedule->schedule->breakTime }}</td>
                            <td class="text-center">{{ $mySchedule->schedule->endTime }}</td>
                            <td class="text-end">
                                <form action="/mySchedule/{{ $mySchedule->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Apakah Anda Yakin Akan Melakukan Aksi Ini?')"
                                        class="btn btn-outline-danger">
                                        <span data-feather="trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Anda Belum Memiliki Schedule.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
