@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Admit for ') }} <b>{{$applicant->name}}</b></div>

                <div class="card-body">
                    <table class="table-striped">
                        <tr>
                            <th>School</th>
                            <td>: {{$applicant->school_name}}</td>
                        </tr>
                        <tr>
                            <th>class</th>
                            <td>: {{$applicant->class}}</td>
                        </tr>
                    </table>
                    <form method="POST" action="{{ url($action_url) }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Applicant ID --}}
                        <div class="form-group row" style="display: none">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Applicant ID') }}</label>

                            <div class="col-md-6">
                                <input id="applicant_id" type="number" class="form-control @error('applicant_id') is-invalid @enderror" name="applicant_id" value="{{ $applicant->id }}" required autocomplete="applicant_id" autofocus>

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