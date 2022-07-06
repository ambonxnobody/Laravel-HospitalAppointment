@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row ">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="/diagnose/{{ $diagnose->id }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea required name="diagnosis" id="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
                                cols="30" rows="5" autofocus>
                                {{ old('diagnosis', $diagnose->diagnosis) }}
                            </textarea>
                            @error('diagnosis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="prescription">Prescription</label>
                            <textarea name="prescription" id="prescription" class="form-control @error('prescription') is-invalid @enderror"
                                cols="30" rows="5">{{ old('prescription', $diagnose->prescription) }}</textarea>
                            @error('prescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-warning">
                                <span data-feather="save" class="align-text-bottom"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
