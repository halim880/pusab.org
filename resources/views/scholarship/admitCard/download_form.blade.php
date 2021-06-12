@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <b>Download Admit Card</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url($action_url)}}" method="POST">
                            @method('POST')
                            @csrf
                            {{-- Roll --}}
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                                <div class="col-md-6">
                                    <input id="applicant_id" type="number" class="form-control @error('applicant_id') is-invalid @enderror" name="applicant_id" placeholder="e.g 21090001" required autocomplete="applicant_id" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection