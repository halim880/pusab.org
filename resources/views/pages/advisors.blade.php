@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>PUSAB advisors</h3>
                    </div>
                    <div class="card-body">
                        @if ($advisors->count()<1)
                            <div class="row justify-content-center">
                                <h5><b>No advisor</b></h5>
                            </div>
                        @else
                        <div class="row">
                            @foreach ($advisors as $advisor)
                            <div class="col-6 col-md-4">
                                <div class="card p-2 mb-3">
                                    <div class="row justify-content-center">
                                        <img class="rounded-circle" src="{{asset($advisor->image_path)}}" alt="" height="70" width="70">
                                    </div>
                                    <div class="row">
                                        <div class="col text-center"><b>{{$advisor->name}}</b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><b>Dept.:</b> <span>{{$advisor->department}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><b>Inst.:</b> <span>{{$advisor->institution}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection