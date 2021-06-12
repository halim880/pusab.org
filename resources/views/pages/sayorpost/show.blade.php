@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <img class="rounded rounded-circle avatar" src="{{asset($post->getCreatorImg())}}" alt="">
                                <p>Abdul Halim</p>
                            </div>
                            <div class = "col-9 col-md-10">
                                <h3>{{$post->title}}</h3>
                                <div style="margin-bottom: 10px">
                                    <i class="fa fa-clock" style="color:rgb(155, 206, 78)"></i>
                                    <span style="color: grey; font-size:14px;">{{$post->getCreatedTime()}}</span>
                                </div>
                                <p>
                                    {{$post->body}}
                                </p>
                            </div>
                        </div>
                        @if ($post->isCreator())
                            <div class="row justify-content-end">
                                <a class="btn btn-info mx-2" href="">Edit</a>
                                <a class="btn btn-danger mx-2" href="">Delete</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .avatar{
        border: 1px solid greenyellow;
        margin: 10px;
        width: 70px;
        height: 70px;
    }

    @media (max-width: 550px) { 
        .avatar{
            width: 45px;
            height: 45px;
        }
     }
</style>