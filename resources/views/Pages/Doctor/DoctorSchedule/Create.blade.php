@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/mySchedule" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
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
                @if ($schedules->count() > 0)
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{ $schedule->day }}</td>
                            <td class="text-center">{{ $schedule->startTime }}</td>
                            <td class="text-center">{{ $schedule->breakTime }}</td>
                            <td class="text-center">{{ $schedule->endTime }}</td>
                            <td class="text-end">
                                <form action="/mySchedule" method="POST">
                                    @csrf
                                    <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda Yakin Akan Menambahkan Schedule Ini?')"
                                        class="btn btn-outline-success">
                                        <span data-feather="plus"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Tidak Ada Schedule yang Tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
