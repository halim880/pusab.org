@extends('layouts.backend')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-4">
          <div class="card-header">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary pull-right" href="{{route('members.create')}}">Add new member</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">University</th>
                  <th scope="col">roles</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sessions as $session => $members)
                  <tr>
                      <th colspan="5" style="background: rgb(194, 247, 194)">
                        <div align="center"><span>Session</span> : <span style="color: red">{{$session}}</span></div>
                      </th>
                  </tr>
                  @foreach ($members as $member)
                  <tr>
                    <th><img src="{{asset($member->image_path)}}" alt="" height="50" width="50" class="rounded-circle"></th>
                    <th>{{$member->name}}</th>
                    <th>{{$member->institution}}</th>
                    <th>
                      @foreach ($member->getRoles() as $role)
                        {{$role->name}}
                      @endforeach
                    </th>
                    <th><a class="btn btn-sm btn-primary" href="{{url('backend/members/'.$member->id)}}">View</a></th>
                  </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>
      </div>
        </div>
      </div>
    </div>
  </div>
@endsection