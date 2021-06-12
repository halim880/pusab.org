@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card my-4 p-3">
                    <div class="card-body">
                        <div class="row justify-content-between border-bottom py-2">
                            <h4>Recent posts</h4>
                            @auth
                                <a href="{{url('sayor-post/create')}}" class="btn btn-primary">
                                    Write to sayor
                                </a>
                            @endauth
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success mt-3">
                                <strong>Success! </strong> <span>{{Session::get('success')}}</span>
                            </div>
                            
                        @endif
                        @foreach ($posts as $post)
                            <div class="row my-2">
                                <div class="col-3 col-md-2">
                                    <img class="rounded rounded-circle avatar" src="{{asset($post->getCreatorImg())}}" alt="">
                                </div>
                                <div class="col-8 col-md-10">
                                    <h3>{{$post->title}}</h3>
                                    <div style="margin-bottom: 10px">
                                        <i class="fa fa-clock" style="color:rgb(155, 206, 78)"></i>
                                        <span style="color: grey; font-size:14px;">{{$post->getCreatedTime()}}</span>
                                    </div>
                                    <p class="mb-0">
                                        @if (strlen($post->body)> 150)
                                            {{substr($post->body, 1, 150)}}
                                        @else
                                            {{$post->body}}
                                        @endif
                                    </p>
                                    <a href="{{url('sayor-post/show/'.$post->id)}}">Read more...</a>
                                </div>
                            </div>
                        @endforeach
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