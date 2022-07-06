@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/medicalHistory" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row ">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="/medicalHistory/{{ $medicalHistory->id }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="condition">Condition</label>
                            <textarea required name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror"
                                cols="30" rows="5" autofocus>
                                {{ old('condition', $medicalHistory->condition) }}
                            </textarea>
                            @error('condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="surgeries">Surgeries</label>
                            <textarea name="surgeries" id="surgeries" class="form-control" cols="30" rows="5">{{ old('surgeries', $medicalHistory->surgeries) }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="medication">Medication</label>
                            <textarea name="medication" id="medication" class="form-control" cols="30" rows="5">{{ old('medication', $medicalHistory->medication) }}</textarea>
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
