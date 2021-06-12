@extends('layouts.backend')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-4">
          <div class="card-header">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary pull-right" href="{{route('advisors.create')}}">Add new member</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Passing year</th>
                  <th scope="col">Job title</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($advisors as $advisor)
                <tr>
                  <th><img src="{{asset($advisor->image_path)}}" alt="" height="50" width="50" class="rounded-circle"></th>
                  <th>{{$advisor->name}}</th>
                  <th>{{$advisor->institution}}</th>
                  <th>
                      {{$advisor->passing_year}}
                  </th>
                  <th>{{$advisor->job_title}}</th>
                  <th><a class="btn btn-danger" href="{{url('backend/advisors/'.$advisor->id)}}">View</a></th>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
        </div>
      </div>
    </div>
  </div>
@endsection