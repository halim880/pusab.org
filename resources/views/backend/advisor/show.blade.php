
@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Advisor's Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 border p-3">
                                <div id="image">
                                    <img src="{{asset($advisor->image_path)}}" alt="" height="150px" width="150px" class="rounded justify-content-center">
                                </div>
                            </div>
                            <div class="col-md-9" id="academic_info">
                                <div id="name">
                                    <h4 align="center">
                                        <b>{{$advisor->name}}</b> 
                                    </h4>
                                </div>
                                <div>
                                    <div class="title">University</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->institution}}</div>
                                </div>
                                <div>
                                    <div class="title">Department</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->department}}</div>
                                </div>
                                <div>
                                    <div class="title">Passing year</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->passing_year}}</div>
                                </div>
                                <div>
                                    <div class="title">Profession</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->profession}}</div>
                                </div>
                                <div>
                                    <div class="title">Job title</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->job_title}}</div>
                                </div>
                                <div>
                                    <div class="title">Job Location</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->job_location}}</div>
                                </div>
                                <div>
                                    <div class="title">Phone</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->phone}}</div>
                                </div>
                                <div>
                                    <div class="title">Email</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->email}}</div>
                                </div>
                                <div>
                                    <div class="title">Address</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->permanent_address}}</div>
                                </div>
                                <div>
                                    <div class="title">Current Address</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$advisor->current_address}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <a class="btn btn-sm mx-2 btn-primary" href="{{route('advisors.edit', $advisor->id)}}">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<style scoped>
    #image{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #name{
        padding: 4px;
    }
    #show_mamber{
        width: 800px;
        max-width: 100%;
    }
    #personal_info>div,
    #address>div,
    #academic_info > div{
        padding: 7px;
        display: flex;
    }
    .colon{
        padding:0 7px;
    }
    #academic_info .title,
    #personal_info .title,
    #address .title{
        max-width: 120px;
        min-width: 110px;
        font-weight: 900;
    }

    #academic_info .info,
    #personal_info .info,
    #address .info{
        overflow-wrap:normal;
    }


    @media (max-width: 450px) {
        #academic_info .title,
        #personal_info .title,
        #address .title{
            max-width: 80px;
            min-width: 80px;
        }

        #academic_info,
        #personal_info,
        #address{
            font-size: 12px;
        }
     }
</style>
