@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 mb-3 shadow">
                <div class="card-header shadow text-center bg-primary"><b style="font-size: 25px">{{ __('Applcation form') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ url($action_url) }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Exam Id --}}
                        <div class="form-group row" style="display: none">
                            <div class="col-md-6">
                                <input name="exam_id" value="{{$exam_id}}">
                            </div>
                        </div>
                        {{-- Name --}}
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

                        {{-- Father name --}}
                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __("Father's Name") }}</label>
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
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __("Mother's Name") }}</label>
                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" required value="{{ old('mother_name') }}" autocomplete="mother_name">

                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- high_school --}}
                        <div class="form-group row">
                            <label for="high_school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="school_id" id="">
                                    @foreach ($schools as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>

                                @error('high_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Class --}}
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
                            <div class="col-md-6">
                                <input id="class" type="number" class="form-control @error('class') is-invalid @enderror" name="class" required value="{{ old('class') }}" autocomplete="class">

                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- village --}}
                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">{{ __('Village') }}</label>
                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" required value="{{ old('village') }}" autocomplete="village">

                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- post_office --}}
                        <div class="form-group row">
                            <label for="post_office" class="col-md-4 col-form-label text-md-right">{{ __('Post office') }}</label>
                            <div class="col-md-6">
                                <input id="post_office" type="text" class="form-control @error('post_office') is-invalid @enderror" name="post_office" required value="{{ old('post_office') }}" autocomplete="post_office">

                                @error('post_office')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- union --}}
                        <div class="form-group row">
                            <label for="union" class="col-md-4 col-form-label text-md-right">{{ __('Union') }}</label>
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
                            <label for="current_address" class="col-md-4 col-form-label text-md-right">{{ __('Current Address') }}</label>
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
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
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
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
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