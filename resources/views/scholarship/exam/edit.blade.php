@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header text-center"><h3>{{ __('Update Exam') }}</h3></div>
            <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Exam title') }}</label>
        
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $exam->name }}" required autocomplete="name" autofocus>
        
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>
        
                        <div class="col-md-6">
                            <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{$exam->date}}" required autocomplete="name" autofocus>
        
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" onclick="updateExam({{$exam->id}})">
                                {{ __('Submit') }}
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
    async function updateExam(id) {
        const data = {
            name : document.getElementById('name').value,
            date : document.getElementById('date').value,
        }

        let url = 'http://127.0.0.1:8000/api/scholarship/exams/'+id;

        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            
            body: JSON.stringify(data)
        });
        window.location = "http://127.0.0.1:8000/scholarship/exams/"+id;
    }
</script>