@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4 p-4">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <h3>{{$exam->name}}</h3>
                            <a class="btn btn-info" href="{{url($exam->edit_url)}}">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="row justify-content-center">
                                <b class="p-3" style="color: green">{{Session::get('success')}}</b>
                            </div>
                        @endif
                        <div class="row">
                            <table class="table table-striped">
                                <tr>
                                    <th>Status</th>
                                    <td> : 
                                        @if ($exam->isApplicationOngoing())
                                            <b style="color: rgb(9, 192, 33)">Application is ongoing</b>
                                            <a class="btn btn-sm btn-warning mx-2" href="{{url('exam/'.$exam->id.'/application/close')}}">Close</a>
                                        @else
                                            <b style="color: rgb(34, 36, 34)">Application is closed</b>
                                            <a class="btn btn-sm btn-primary mx-2" href="{{url('exam/'.$exam->id.'/application/start')}}">Start</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td> : {{$exam->getDate()}}</td>
                                </tr>
    
                                <tr>
                                    <th>Time</th>
                                    <td> : {{$exam->time}}</td>
                                </tr>
                                <tr>
                                    <th>Centers</th>
                                    <td>
                                        @if ($exam->centers->count()>0)
                                            @foreach ($exam->getCenters() as $center)
                                            <div>
                                            <p>{{$center['name']}}</p>
                                            </div>
                                            @endforeach
                                        @else
                                            <span>No center created</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Application Dadline</th>
                                    <td> : <b style="color: red;">{{$exam->getApplicationDadline()}}</b></td>
                                </tr>
                                <tr>
                                    <th>Admit Card</th>
                                    @if ($exam->isAdmitCardAvailable())
                                        <td> : Admit Card is published</td>
                                    @else
                                        
                                        <td> : Admit Card not published 
                                            <a class="btn btn-sm btn-primary" href="{{url('exam/'.$exam->id.'/application/publish')}}">publish</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Total Applicant</th>
                                    <td> : 
                                        <b>{{$exam->getTotalApplicant()}}</b>
                                        <a class="btn btn-success btn-sm" href="{{url('exam/'.$exam->id.'/applicants')}}">See applicants</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Result</th>
                                    @if ($exam->isResultPublished())
                                        <td> : <a class="btn btn-sm btn-primary" href="{{url('exam/'.$exam->id.'/application/result')}}">View results</a></td>
                                    @else
                                        
                                        <td> : Result is not published 
                                            
                                    @endif
                                </tr>
                            </table>
                        </div>
                        <div class="row justify-content-center">                            
                            <button class="btn btn-danger" onclick="deleteExam({{$exam->id}})">Delete</button>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card mt-4">
                    <ul class="list-group">
                        <li class="list-item">
                            <a class="nav-link" href="{{url('scholarship/results/create')}}">Create Result</a>
                        </li>
                        <li class="list-item">
                            <a class="nav-link" href="{{url('scholarship/centers/create?examId='.$exam->id)}}">Create Center</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    async function deleteExam(id) {
        await fetch('http://127.0.0.1:8000/api/scholarship/exams/'+id, {
            method: 'delete'
        })

        window.location = 'http://127.0.0.1:8000/scholarship/exams';
    }
</script>