@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit applicant') }}</div>

                <div class="card-body">
  
                      {{-- Name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$applicant->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Father name --}}
                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('father_name') }}</label>
                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" required value="{{$applicant->father_name}}" autocomplete="father_name">

                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Mother name --}}
                        <div class="form-group row">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __('mother_name') }}</label>
                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" required value="{{$applicant->mother_name}}" autocomplete="mother_name">

                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- high_school --}}
                        <div class="form-group row">
                            <label for="high_school" class="col-md-4 col-form-label text-md-right">{{ __('high_school') }}</label>
                            <div class="col-md-6">
                                <input id="high_school" type="text" class="form-control @error('high_school') is-invalid @enderror" name="high_school" required value="{{$applicant->high_school}}" autocomplete="high_school">

                                @error('high_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- village --}}
                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">{{ __('village') }}</label>
                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" required value="{{$applicant->village}}" autocomplete="village">

                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- post_office --}}
                        <div class="form-group row">
                            <label for="post_office" class="col-md-4 col-form-label text-md-right">{{ __('post_office') }}</label>
                            <div class="col-md-6">
                                <input id="post_office" type="text" class="form-control @error('post_office') is-invalid @enderror" name="post_office" required value="{{ $applicant->post_office }}" autocomplete="post_office">

                                @error('post_office')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- union --}}
                        <div class="form-group row">
                            <label for="union" class="col-md-4 col-form-label text-md-right">{{ __('union') }}</label>
                            <div class="col-md-6">
                                <input id="union" type="text" class="form-control @error('union') is-invalid @enderror" name="union" required value="{{ $applicant->union }}" autocomplete="union">

                                @error('union')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- current_address --}}
                        <div class="form-group row">
                            <label for="current_address" class="col-md-4 col-form-label text-md-right">{{ __('current_address') }}</label>
                            <div class="col-md-6">
                                <input id="current_address" type="text" class="form-control @error('current_address') is-invalid @enderror" name="current_address" required value="{{ $applicant->current_address }}" autocomplete="current_address">

                                @error('current_address')
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
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ $applicant->phone }}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        {{-- onclick="update({{$applicant->id}})" --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    async function update(id) {
        const data = {
            name : document.getElementById('name').value,
            father_name : document.getElementById('father_name').value,
            mother_name : document.getElementById('mother_name').value,
            institution : document.getElementById('institution').value,
            department : document.getElementById('department').value,
            session : document.getElementById('session').value,
            college : document.getElementById('college').value,
            high_school : document.getElementById('high_school').value,
            blood_group : document.getElementById('blood_group').value,
            village : document.getElementById('village').value,
            post_office : document.getElementById('post_office').value,
            union : document.getElementById('union').value,
            current_address : document.getElementById('current_address').value,
            phone : document.getElementById('phone').value,
        }


        let url = 'http://127.0.0.1:8000/api/backend/applicants/update/'+id;

        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            
            body: JSON.stringify(data)
        });

        window.location = "http://127.0.0.1:8000/backend/members";
    }
</script>