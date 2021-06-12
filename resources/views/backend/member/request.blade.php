
@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Member's Details</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div>{{Session::get('message')}}</div>
                        @endif
                        <div class="row">
                            <div class="col-md-3 border p-3">
                                <div id="image">
                                    <img src="{{asset($member->image_path)}}" alt="" height="150px" width="150px" class="rounded justify-content-center">
                                </div>
                            </div>
                            <div class="col-md-9" id="academic_info">
                                <div id="name">
                                    <h4 align="center">
                                        <b>{{$member->name}}</b> 
                                        @if ($member->hasRole('admin'))
                                            <sup><small style="color: red">Admin</small></sup>
                                        @elseif($member->hasRole('executive'))
                                            <sup><small style="color: rgb(12, 121, 103)">Executive</small></sup>
                                        @endif
                                    </h4>
                                </div>
                                <div>
                                    <div class="title">University</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$member->institution}}</div>
                                </div>
                                <div>
                                    <div class="title">Department</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$member->department}}</div>
                                </div>
                                <div>
                                    <div class="title">Session</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$member->session}}</div>
                                </div>
                                <div>
                                    <div class="title">College</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$member->college}}</div>
                                </div>
                                <div>
                                    <div class="title">High School</div>
                                    <div class="colon">:</div>
                                    <div class="info">{{$member->high_school}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="personal_info">
                                    <div>
                                        <div class="title">Phone</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->phone}}</div>
                                    </div>
                                    <div>
                                        <div class="title">Email</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->email}}</div>
                                    </div>
                                    <div>
                                        <div class="title">Blood Group</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->blood_group}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="address">
                                    <div>
                                        <div class="title">Father's Name</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->father_name}}</div>
                                    </div>
                                    <div>
                                        <div class="title">Mother's Name</div>
                                        <div class="colon">:</div> 
                                        <div class="info">{{$member->mother_name}}</div>
                                    </div>
                                    <div>
                                        <div class="title">Address</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->address}}</div>
                                    </div>
                                    <div>
                                        <div class="title">Current Address</div>
                                        <div class="colon">:</div>
                                        <div class="info">{{$member->current_address}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a class="btn btn-sm mx-2 btn-primary @if($member->approved==1) disabled @endif" href="{{route('members.approve', $member->id)}}">Approve</a>
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
