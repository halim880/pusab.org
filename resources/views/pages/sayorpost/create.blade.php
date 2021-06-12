@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-4">
                <div class="card-header">
                    <h4>Write your post</h4>
                </div>
                <div class="card-body">
                                    <!--Section: Contact v.2-->
                    <form id="sayorpost-form" name="sayorpost-form" action="{{url($action_url)}}" method="POST">
                        <!--Grid row-->
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-3">
                                    <label for="title" class="">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-3">
                                    <label for="category_id" class="">Category</label>
                                    <select class="form-control" name="category_id" id="">
                                        <option value="1">Science</option>
                                        <option value="2">Education</option>
                                        <option value="2">Travels</option>
                                        <option value="3">Others</option>
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-12 mb-3">
                                <div class="md-form">
                                    <label for="body">Body</label>
                                    <textarea type="text" id="body" name="body" rows="2" class="form-control md-textarea"></textarea>
                                    
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                            </div>
                        </div>
                        <!--Grid row-->
                    </form>
        
                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('sayorpost-form').submit();">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection