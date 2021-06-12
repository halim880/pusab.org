@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{url('scholarship/exams/create')}}">Create Exam</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{$exam->name}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{url($exam->url)}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

