@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-end">
                            <a class="btn btn-primary" href="{{url($create_school_url)}}">Add new school</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($schools->count()>0)
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">SI.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($schools as $school)
                              <tr>
                                <th>{{$loop->index+1}}</th>
                                <th>{{$school->name}}</th>
                                <th>
                                    <a class="btn btn-sm btn-warning" href="{{url($school->url)}}">View</a>
                                    <button class="btn btn-sm btn-danger" onclick="deleteSchool({{$school->id}})">Delete</button>
                                </th>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        @else
                            <h4>No school found</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    async function deleteSchool(endpoint) {
        
        await fetch('http://127.0.0.1:8000/api/scholarship/schools/'+endpoint, {
            method: 'delete'
        })

        window.location = 'http://127.0.0.1:8000/scholarship/schools';
    }
</script>
