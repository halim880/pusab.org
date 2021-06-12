@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <div class="row p-3">
                <h3>Recent Activity</h3>
            </div>
            <div class="row">
                @foreach ($activities as $activity)
                <div class="col-md-3 col-sm-4">
                        <a href="">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img class="activity-image-container" src="{{asset($activity->image_path)}}" alt="" height="200" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="p-3">{{$activity->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection