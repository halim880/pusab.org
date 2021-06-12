@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row justify-content-between px-4">
                            <div>Roles</div>
                            <a class="btn btn-primary" href="{{url('backend/roles/create')}}">Create role</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div>
                                {{Session::get("message")}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SI.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{url('backend/roles/'.$role->id.'/edit')}}">Edit</a>
                                            <button class="btn btn-sm btn-danger" onclick="deleteRole({{$role->id}})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    async function deleteRole(id) {
        await fetch('http://127.0.0.1:8000/api/backend/roles/'+id, {
            method: 'delete'
        })

        window.location = 'http://127.0.0.1:8000/backend/roles';
    }
</script>