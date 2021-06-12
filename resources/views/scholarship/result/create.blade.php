@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <b><h4>Store Result</h4></b>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="row justify-content-center">
                                <p style="color: green">{{Session::get('success')}}</p>
                            </div>
                        @endif
                        <form action="{{url($action_url)}}" method="post">
                            @method('POST')
                            @csrf
                            {{-- Applicant ID --}}
                            <div class="form-group row">
                                <label for="applicant_id" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                                <div class="col-md-6">
                                    <input id="applicant_id" type="number" class="form-control @error('applicant_id') is-invalid @enderror" name="applicant_id" value="{{ old('applicant_id') }}" required autocomplete="applicant_id" autofocus>

                                    @error('applicant_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Correnct answer --}}
                            <div class="form-group row">
                                <label for="correct_answer" class="col-md-4 col-form-label text-md-right">{{ __('Correnct answer') }}</label>

                                <div class="col-md-6">
                                    <input id="correct_answer" type="number" class="form-control @error('correct_answer') is-invalid @enderror" name="correct_answer" value="{{ old('correct_answer') }}" required autocomplete="correct_answer" autofocus>

                                    @error('correct_answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Inorrenct answer --}}
                            <div class="form-group row">
                                <label for="incorrect_answer" class="col-md-4 col-form-label text-md-right">{{ __('Inorrenct answer') }}</label>

                                <div class="col-md-6">
                                    <input id="incorrect_answer" type="number" class="form-control @error('incorrect_answer') is-invalid @enderror" name="incorrect_answer" value="{{ old('incorrect_answer') }}" required autocomplete="incorrect_answer" autofocus>

                                    @error('incorrect_answer')
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