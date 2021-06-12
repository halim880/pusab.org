@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url($action_url) }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Applicant ID --}}
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Applicant ID') }}</label>

                            <div class="col-md-6">
                                <input id="applicant_id" type="number" class="form-control @error('applicant_id') is-invalid @enderror" name="applicant_id" value="{{ old('applicant_id') }}" required autocomplete="applicant_id" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        {{-- Center --}}
                        <div class="form-group row">
                            <label for="center" class="col-md-4 col-form-label text-md-right">{{ __('Select center') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="center_id" id="center">
                                    @foreach ($centers as $center)
                                        <option value="{{$center->id}}">{{$center->name}}</option>
                                    @endforeach
                                </select>
                                @error('center_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Room Number --}}
                        <div class="form-group row">
                            <label for="room_number" class="col-md-4 col-form-label text-md-right">{{ __('Room No.') }}</label>

                            <div class="col-md-6">
                                <input id="room_number" type="number" class="form-control @error('room_number') is-invalid @enderror" name="room_number" value="{{ old('room_number') }}" required autocomplete="room_number" autofocus>

                                @error('room_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Sit Number --}}
                        <div class="form-group row">
                            <label for="sit_number" class="col-md-4 col-form-label text-md-right">{{ __('Sit No.') }}</label>

                            <div class="col-md-6">
                                <input id="sit_number" type="number" class="form-control @error('sit_number') is-invalid @enderror" name="sit_number" value="{{ old('sit_number') }}" required autocomplete="sit_number" autofocus>

                                @error('sit_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Signature') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
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