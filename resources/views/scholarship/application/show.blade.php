<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application</title>
    <style>
        table td{
            padding: 5px;
        }
        h4{
            margin-top: 8px;
            margin-bottom: 6px;
        }
        table tr:nth-child(odd) {
            background: rgb(241, 239, 239);
        }
    </style>
</head>
<body>
    <div style="width: 550px; margin:auto">
        <div style="background: green; color:white;">
            <h3 align="center" style="padding: 10px">{{$applicant->getExamName()}}</h3>
        </div>
        <div>
            
            <div align="center">
                <img src="{{asset($applicant->image_path)}}" alt="" height="150" width="150">
            </div>
            <div align="center" style="padding: 10px">
                <b>Application Form</b>
            </div>
            <div>
                <table class="striped" width="550px">
                    <tr>
                        <td width ="120">Name</td>
                        <td>{{$applicant->name}}</td>
                    </tr>
                    <tr>
                        <td>Roll No.</td>
                        <td>{{$applicant->getRole()}}</td>
                    </tr>
                    
                    
                    <tr>
                        <td>Class</td>
                        <td>{{$applicant->class}}</td>
                    </tr>
                    @if ($applicant->hasGroup())
                        <tr>
                            <td>Group</td>

                            <td>{{__('General')}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>School</td>
                        <td>{{$applicant->school_name}}</td>
                    </tr>
                    <tr>
                        <td>Father's Name</td>
                        <td>{{$applicant->father_name}}</td>
                    </tr>
                
                    <tr>
                        <td>Mother's Name</td>
                        <td>{{$applicant->mother_name}}</td>
                    </tr>
            </table>
        </div>
        <h4>Contact Info.</h4>
        <div>
            <table>
                <tr>
                    <td width ="120">Phone</td>
                    <td>{{$applicant->phone}}</td>
                </tr>
                <tr>
                    <td>Current address</td>
                    <td>{{$applicant->current_address}}</td>
                </tr>
                <tr>
                    <td>Permanent Address</td>
                    <td>{{$applicant->getPermanentAddress()}}</td>
                </tr>
            </table>
        </div>
        </div>
        <div align = "center" style="margin: 10px;">
            <a style="
                text-decoration:none;
                background: rgb(224, 55, 77);
                color: white;
                padding: 5px 10px;
                border-radius:3px;
            " href="{{url('application/download/'.$applicant->id)}}">Download</a>
        </div>
    </div>
</body>
</html>

