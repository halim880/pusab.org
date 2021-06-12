


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table td{
            padding: 6px 0;
        }
        h4{
            margin-top: 8px;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <div style="border:1px solid grey; width: 620px; padding:10px 0; margin:auto">
        <table style="border-collapse:collapse;:20px; margin:auto" width="600px">
            <tr style="background: green; color:white;">
                <td colspan="3" align="center"><h4>{{$data['exam']}}</h4></td>
            </tr>
            <tr style="color:black;">
                <td colspan="3" align="center"><h4>Admid Card</h4></td>
            </tr>
            <tr>
                <td rowspan="{{count(array_keys($data))}}" style="vertical-align: top" width="170px">
                    <img src="{{asset($data['image'])}}" alt="" height="130" width="130">
                </td>
                <th align="start" width="130px">Name</th>
                <td>{{$data['name']}}</td>
            </tr>
            <tr>
                <th align="start">Roll No.</th>
                <td>{{$data['roll']}}</td>
            </tr>
            
            <tr>
                <th align="start">Class</th>
                <td>{{$data['class']}}</td>
            </tr>
            <tr>
                <th align="start">School</th>
                <td>{{$data['school']}}</td>
            </tr>
            <tr>
                <th align="start">Center</th>
                <td>{{$data['center']}}</td>
            </tr>
            <tr>
                <th align="start">Room</th>
                <td>{{$data['room']}}</td>
            </tr>
            <tr>
                <th align="start">Father's Name</th>
                <td>{{$data['father_name']}}</td>
            </tr>
            <tr>
                <th align="start">Mother's Name</th>
                <td>{{$data['mother_name']}}</td>
            </tr>
        </table>
        <div align = "center" style="margin: 10px;">
            <a style="
                text-decoration:none;
                background: rgb(224, 55, 77);
                color: white;
                padding: 5px 10px;
                border-radius:3px;
            " href="{{url('admitCard/download/'.$data['id'])}}">Download</a>
        </div>
    </div>
</body>
</html>