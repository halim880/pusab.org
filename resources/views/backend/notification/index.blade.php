@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">
                        Notifications
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach (Auth::user()->notifications as $notification)
                                <li>
                                    <a href="member/request/{{$notification->data['id']}}?notification_id={{$notification->id}}">
                                        {{$notification->data['message']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection