@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/schedule/create" class="btn btn-outline-success">
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
                    <th class="text-center" scope="col">Selesai</th>
                </tr>
            </thead>
            <tbody>
                @if ($schedules->count() > 0)
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td class="text-center">
                                {{ $schedule->day }}
                            </td>
                            <td class="text-center">{{ $schedule->startTime }}</td>
                            <td class="text-center">{{ $schedule->breakTime }}</td>
                            <td class="text-center">{{ $schedule->endTime }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Tidak Ada Data Schedule.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
