@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>PUSAB Notices</h3>
                    </div>
                    <div class="card-body">
                        @if ($notices->count()<1)
                            <div class="row justify-content-center">
                                <h5><b>No Notice</b></h5>
                            </div>
                        @else
                            
                        <div class="row">
                            <table class="table table-striped">
                                @if (isset($exam))
                                    @if ($exam->isApplicationOngoing())
                                        <tr>
                                            <td>
                                                <a class="btn btn-sm mx-3 btn-primary" href="{{url(\App\Models\Applicant::createUrl())}}">Apply for</a> {{$exam->name}}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($exam->isAdmitCardAvailable())
                                        <tr>
                                            <td>
                                                <a class="btn btn-sm mx-3 btn-primary" href="">Download Admit Card</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            </table>
                        </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection