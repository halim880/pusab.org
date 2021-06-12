@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Scholarship Exam</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <p style="color: rgb(9, 184, 67)">{{Session::get('message')}}</p>
                            <a href="{{$url}}">Download form</a>
                        @endif
                        <div class="row">
                            <table class="table table-striped">
                                @if (isset($exam))
                                    @if ($exam->isApplicationOngoing())
                                        <tr>
                                            <td>
                                                <a class="btn btn-sm mx-3 btn-primary" href="{{url('application/form/'.$exam->id)}}">Apply for</a> {{$exam->name}}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($exam->isAdmitCardAvailable())
                                        <tr>
                                            <td> 
                                                <a class="btn btn-sm mx-3 btn-warning" href="{{url('admitcard/download/form')}}">Download</a> Admit Card
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection