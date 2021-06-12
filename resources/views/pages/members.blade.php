@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <h3 class="p-3 border-bottom">PUSAB Members</h3>
                        </div>
                        <div class="row">
                            @foreach ($members as $member)
                            <div class="col-sm-6 col-md-4 p-3">
                                <div class="card p-2 mb-1 shadow h-100">
                                    <div class="row justify-content-center">
                                        <img class="rounded-circle" src="{{asset($member->image_path)}}" alt="" height="70" width="70" style="border: 3px solid green">
                                    </div>
                                    <div class="row">
                                        <div class="col text-center"><b>{{$member->name}}</b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><b>Dept.:</b> <span>{{$member->department}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><b>Inst.:</b> <span>{{$member->institution}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection