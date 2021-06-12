@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit school') }}</div>
                    <div class="card-body">
  
                        {{-- Name --}}
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
  
                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$school->name}}" required autocomplete="name" autofocus>
  
                                  @error('name')
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
                                  <input id="union" type="text" class="form-control @error('union') is-invalid @enderror" name="union" required value="{{ $school->union }}" autocomplete="union">
  
                                  @error('union')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
  
  
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary" onclick="updateSchool({{$school->id}})">
                                      {{ __('Update') }}
                                  </button>
                              </div>
                          </div>
                          {{-- onclick="update({{$school->id}})" --}}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    async function updateSchool(id) {
        const data = {
            name : document.getElementById('name').value,
            union : document.getElementById('union').value,
        }


        let url = 'http://127.0.0.1:8000/api/scholarship/schools/'+id;

        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            
            body: JSON.stringify(data)
        });
        window.location = "http://127.0.0.1:8000/scholarship/schools/"+id;
    }
</script>