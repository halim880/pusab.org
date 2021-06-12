@extends('layouts.backend')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4 mb-4 shadow">
                    <div class="card-header p-4">
                        <div class="row justify-content-between px-3">
                            <h4>{{$applicants[0]->exam->name}}</h4>
                            <a class="btn btn-sm btn-success pull-right" href="{{route('applicants.create')}}">Add new applicant</a>

                        </div>
                    </div>
                   <div class="card-body">
                    <div class="row justify-content-center">
                        <h4><b>Applicant's list</b></h4>
                    </div>
                    @if ($applicants->count()>0)
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($applicants as $applicant)
                          <tr>
                            <th><img src="{{asset($applicant->image_path)}}" alt="" height="50" width="50" class="rounded-circle"></th>
                            <th>{{$applicant->name}}</th>
                            <th>
                                <a class="btn btn-sm btn-warning" href="{{url($applicant->url)}}">View</a>
    
                                @if ($applicant->hasAdmitCard())
                                    <a class="btn btn-sm btn-primary" href="{{url($applicant->show_admit_card_url)}}">Admit Card</a>
                                @else
                                    <a class="btn btn-sm btn-primary" href="{{url($applicant->create_admit_card_url)}}">Create Admit Card</a> 
                                @endif
                                <button class="btn btn-sm btn-danger" onclick="deleteApplicant({{$applicant->id}})">Delete</button>
                            </th>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                        <h4>No applicant found</h4>
                    @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    async function deleteApplicant(endpoint) {
        
        await fetch('http://127.0.0.1:8000/api/scholarship/applicants/'+endpoint, {
            method: 'delete'
        })

        window.location = 'http://127.0.0.1:8000/scholarship/applicants';
    }
</script>
