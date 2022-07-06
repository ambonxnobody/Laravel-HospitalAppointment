@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/schedule" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row ">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="/schedule" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="startTime">Mulai Jam Kerja</label>
                            <input type="time" name="startTime" id="startTime"
                                class="form-control @error('startTime') is-invalid @enderror" autofocus
                                value="{{ old('startTime') }}" required>
                            @error('startTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="breakTime">Jam Istirahat</label>
                            <input type="time" name="breakTime" id="breakTime"
                                class="form-control @error('breakTime') is-invalid @enderror"
                                value="{{ old('breakTime') }}">
                            @error('breakTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="endTime">Selesai Jam Kerja</label>
                            <input type="time" name="endTime" id="endTime"
                                class="form-control @error('endTime') is-invalid @enderror" value="{{ old('endTime') }}"
                                required>
                            @error('startTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="day">Hari Kerja</label>
                            <select name="day" id="day" class="form-select @error('day') is-invalid @enderror"
                                required>
                                <option selected disabled hidden>Pilih Hari...</option>
                                <option @if (old('day') == 'Senin') selected @endif value="Senin">Senin</option>
                                <option @if (old('day') == 'Selasa') selected @endif value="Selasa">Selasa</option>
                                <option @if (old('day') == 'Rabu') selected @endif value="Rabu">Rabu</option>
                                <option @if (old('day') == 'Kamis') selected @endif value="Kamis">Kamis</option>
                                <option @if (old('day') == 'Jumat') selected @endif value="Jumat">Jumat</option>
                                <option @if (old('day') == 'Sabtu') selected @endif value="Sabtu">Sabtu</option>
                                <option @if (old('day') == 'Minggu') selected @endif value="Minggu">Minggu</option>
                            </select>
                            @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">
                                <span data-feather="save" class="align-text-bottom"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
