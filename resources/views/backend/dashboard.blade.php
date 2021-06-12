@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 shadow">
                <div class="card-header">
                    <h4>Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/dashboard')">
                                                <span class="title">Dashboard</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/members')">
                                                <span class="title">Members</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/advisors')">
                                                <span class="title">Advisors</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/scholarship')">
                                                <span class="title">Scholarship</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/publications')">
                                                <span class="title">Publications</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/notices')">
                                                <span class="title">Notice</span>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="link-div" onclick="goto('backend/activities')">
                                                <span class="title">Activities</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Total Members</th>
                                        <td>: 
                                            {{$totalMember}}
                                            <a href="{{url(\App\Models\Member::BASE_URL)}}" class="btn btn-sm btn-primary">view</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Advisors</th>
                                        <td>: 
                                            {{$totalAdvisor}}
                                            <a href="{{url(\App\Models\Advisor::BASE_URL)}}" class="btn btn-sm btn-primary">view</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
    .link-div{
        display:flex;
        align-items: center;
        justify-content : center;
        border: 1px solid grey;
        height: 7rem;
        width: 8.5rem;
        margin: 1rem;
        cursor: pointer;
        border: 1px solid lightgrey;
        border-radius: 5px;
        background-color: green;
        color: lightgrey;
    }
    .link-div:hover{
        opacity: 0.95;
        color: white;
    }
    .title{
    }

    @media screen (max-width: 400){
        .link-div{
            width: 5rem;
        }
    }
</style>

<script>
    function goto(url){
        url = "http://127.0.0.1:8000/"+ url;
        window.location = url;
    }
</script>