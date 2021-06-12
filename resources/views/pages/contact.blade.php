@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-4">
                    <div class="card-header">
                        <h4>Leave a message to us</h4>
                    </div>
                    <div class="card-body">
                                        <!--Section: Contact v.2-->
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                            <!--Grid row-->
                            <div class="row">
            
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-3">
                                        <label for="name" class="">Your name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <!--Grid column-->
            
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-3">
                                        <label for="email" class="">Your email</label>
                                        <input type="text" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <!--Grid column-->
            
                            </div>
                            <!--Grid row-->
            
                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-3">
                                        <label for="subject" class="">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
            
                            <!--Grid row-->
                            <div class="row">
            
                                <!--Grid column-->
                                <div class="col-md-12 mb-3">
                                    <div class="md-form">
                                        <label for="message">Your message</label>
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    </div>
            
                                </div>
                            </div>
                            <!--Grid row-->
                        </form>
            
                        <div class="text-center text-md-left">
                            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection