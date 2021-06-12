@extends('layouts.backend')
@section('content')
    <div class="container p-4">
        @if ($applications->count()>0)
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{$application->id}}</td>
                        <td>
                            <span class="{{$application->status}}">{{$application->status}}</span>
                        </td>
                        <td><a class="btn btn-primary" href="{{url('scholarship/applications/'.$application->id)}}">Open</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>There is no applications</h4>
    @endif
    </div>
@endsection

<style scoped>
    .received{
        padding: 5px 7px;
        background: rgb(226, 95, 146);
        color: rgb(255, 255, 255);
        border: none;
        border-radius: 5px;
    }

    .confirmed{
        padding: 5px 7px;
        background: rgb(32, 146, 42);
        color: rgb(250, 250, 250);
        border: none;
        border-radius: 5px;
    }
</style>