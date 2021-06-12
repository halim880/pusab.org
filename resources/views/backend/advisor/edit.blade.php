@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                        {{-- Name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $advisor->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $advisor->email }}" required autocomplete="email" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Profession --}}
                        <div class="form-group row">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>
                            <div class="col-md-6">
                                <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" required value="{{ $advisor->profession}}" autocomplete="profession">

                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Job title --}}
                        <div class="form-group row">
                            <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job title') }}</label>
                            <div class="col-md-6">
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" required value="{{ $advisor->job_title }}" autocomplete="job_title">

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Job location --}}
                        <div class="form-group row">
                            <label for="job_location" class="col-md-4 col-form-label text-md-right">{{ __('Job location') }}</label>
                            <div class="col-md-6">
                                <input id="job_location" type="text" class="form-control @error('job_location') is-invalid @enderror" name="job_location" required value="{{ $advisor->job_location}}" autocomplete="job_location">

                                @error('job_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Institution --}}
                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Institution') }}</label>
                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" required value="{{ $advisor->institution}}" autocomplete="institution">

                                @error('institution')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- department --}}
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('department') }}</label>
                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" required value="{{ $advisor->department}}" autocomplete="department">

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- passing_year --}}
                        <div class="form-group row">
                            <label for="passing_year" class="col-md-4 col-form-label text-md-right">{{ __('Passing year') }}</label>
                            <div class="col-md-6">
                                <input id="passing_year" type="number" class="form-control @error('passing_year') is-invalid @enderror" name="passing_year" required value="{{ $advisor->passing_year}}" autocomplete="passing_year">

                                @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- current_address --}}
                        <div class="form-group row">
                            <label for="current_address" class="col-md-4 col-form-label text-md-right">{{ __('Current address') }}</label>
                            <div class="col-md-6">
                                <input id="current_address" type="text" class="form-control @error('current_address') is-invalid @enderror" name="current_address" required value="{{ $advisor->current_address}}" autocomplete="current_address">

                                @error('current_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- permanent_address --}}
                        <div class="form-group row">
                            <label for="permanent_address" class="col-md-4 col-form-label text-md-right">{{ __('Permanent address') }}</label>
                            <div class="col-md-6">
                                <input id="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" required value="{{ $advisor->permanent_address}}" autocomplete="permanent_address">

                                @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- phone --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ $advisor->phone}}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="updateAdvisor({{$advisor->id}})">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    async function updateAdvisor(id) {
        const data = {
            name : document.getElementById('name').value,
            profession : document.getElementById('profession').value,
            job_title : document.getElementById('job_title').value,
            job_location : document.getElementById('job_location').value,
            institution : document.getElementById('institution').value,
            department : document.getElementById('department').value,
            passing_year : document.getElementById('passing_year').value,
            current_address : document.getElementById('current_address').value,
            permanent_address : document.getElementById('permanent_address').value,
            phone : document.getElementById('phone').value,
        }


        let url = 'http://127.0.0.1:8000/api/backend/advisors/'+id;

        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            
            body: JSON.stringify(data)
        });

        window.location = "http://127.0.0.1:8000/backend/advisors/"+id;
    }
</script>