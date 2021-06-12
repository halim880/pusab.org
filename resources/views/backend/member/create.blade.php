@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('member/register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- Father name --}}
                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('father_name') }}</label>
                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" required value="{{ old('father_name') }}" autocomplete="father_name">

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
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" required value="{{ old('mother_name') }}" autocomplete="mother_name">

                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Institution --}}
                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('institution') }}</label>
                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" required value="{{ old('institution') }}" autocomplete="institution">

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
                                <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" required value="{{ old('department') }}" autocomplete="department">

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- session --}}
                        <div class="form-group row">
                            <label for="session" class="col-md-4 col-form-label text-md-right">{{ __('session') }}</label>
                            <div class="col-md-6">
                                <input id="session" type="text" class="form-control @error('session') is-invalid @enderror" name="session" required value="{{ old('session') }}" autocomplete="session">

                                @error('session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- college --}}
                        <div class="form-group row">
                            <label for="college" class="col-md-4 col-form-label text-md-right">{{ __('college') }}</label>
                            <div class="col-md-6">
                                <input id="college" type="text" class="form-control @error('college') is-invalid @enderror" name="college" required value="{{ old('college') }}" autocomplete="college">

                                @error('college')
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
                                <input id="high_school" type="text" class="form-control @error('high_school') is-invalid @enderror" name="high_school" required value="{{ old('high_school') }}" autocomplete="high_school">

                                @error('high_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- blood_group --}}
                        <div class="form-group row">
                            <label for="blood_group" class="col-md-4 col-form-label text-md-right">{{ __('blood_group') }}</label>
                            <div class="col-md-6">
                                <input id="blood_group" type="text" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" required value="{{ old('blood_group') }}" autocomplete="blood_group">

                                @error('blood_group')
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
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" required value="{{ old('email') }}" autocomplete="village">

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
                                <input id="post_office" type="text" class="form-control @error('post_office') is-invalid @enderror" name="post_office" required value="{{ old('email') }}" autocomplete="post_office">

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
                                <input id="union" type="text" class="form-control @error('union') is-invalid @enderror" name="union" required value="{{ old('union') }}" autocomplete="union">

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
                                <input id="current_address" type="text" class="form-control @error('current_address') is-invalid @enderror" name="current_address" required value="{{ old('current_address') }}" autocomplete="current_address">

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
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ old('phone') }}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- image --}}
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required value="{{ old('image') }}">

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
                                    {{ __('Register') }}
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