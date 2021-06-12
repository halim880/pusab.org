
@extends('layouts.backend')
@section('content')
    <div class="container card p-4 mt-4" id="show_mamber">
        <div class="row">
            <div class="col-md-3 p-3">
                <div class="border rounded" id="image">
                    <img src="{{asset($applicant->image_path)}}" alt="" height="150px" width="150px" class="rounded m-2 justify-content-center">
                </div>
            </div>
            <div class="col-md-9" id="academic_info">
                <div>
                    <div class="title">Name</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->name}}</div>
                </div>
                <div>
                    <div class="title">High School</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->high_school}}</div>
                </div>
                <div>
                    <div class="title">Father's Name</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->father_name}}</div>
                </div>
                <div>
                    <div class="title">Mother's Name</div>
                    <div class="colon">:</div> 
                    <div class="info">{{$applicant->mother_name}}</div>
                </div>
                <div>
                    <div class="title">Address</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->address}}</div>
                </div>
                <div>
                    <div class="title">Current Address</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->current_address}}</div>
                </div>
                <div>
                    <div class="title">Phone</div>
                    <div class="colon">:</div>
                    <div class="info">{{$applicant->phone}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-warning" href="{{url($applicant->url.'/edit')}}">Edit</a>
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
