
@extends('layouts.backend')
@section('content')
    <div class="container card p-4 mt-4" id="show_mamber">
        <div class="row">
            <div class="col-md-3 border p-3">
                <div id="name">
                    <h4 align="center">{{$school->name}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-warning" href="{{url($school->edit_url)}}">Edit</a>
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
