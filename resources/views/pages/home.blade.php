@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid slider" id="slider" style="background-image: url({{asset('image/slider_images/04.jpg')}})">
        
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="row justify-content-center">
                                        <img id="chairman_image" class="rounded-circle" src="{{asset('image/slider_images/01.jpg')}}" alt="">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row m-1 p-1 justify-content-center">
                                                <p>ABDUL HALIM</p>
                                            </div>
                                            <div class="row justify-content-center">
                                                <p>PUSABian</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <h3>Public university Student Association of Bisswambharpur</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur magni inventore odit, commodi numquam voluptates aliquam dignissimos, quos ducimus expedita rerum. Dignissimos, vel. Delectus tempore quaerat ullam animi quo, cum possimus necessitatibus quibusdam aliquam architecto officia deleniti suscipit, provident, quam odio dolorem in laudantium! Doloremque corporis debitis doloribus fugiat dicta?
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur nesciunt quos repellendus doloribus qui itaque iusto aliquid explicabo iure culpa quam facere tempore repellat ad dolorum laboriosam quis ipsam, sed, voluptas omnis aut. Modi dignissimos amet iusto nesciunt iure. Dolores, eius? Odio cum hic, numquam porro doloremque quam possimus officiis in quos repudiandae earum atque, velit molestias veniam eum ipsam sunt sed odit aspernatur officia laboriosam sint dignissimos voluptates quaerat. Sequi officia atque vitae ullam quos soluta recusandae omnis accusantium?
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, aliquid expedita quisquam molestiae inventore voluptate odio vitae nemo laudantium quidem, illum nobis doloribus maxime corrupti quis totam magni dolore itaque cum ducimus cupiditate deleniti incidunt repellendus? Magnam nam dignissimos pariatur?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row p-3">
                    <h3>Recent Activity</h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <a href="">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img class="activity-image-container" src="{{asset('image/slider_images/02.jpg')}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="p-3">Acivity title</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <a href="">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img class="activity-image-container"  src="{{asset('image/slider_images/06.jpg')}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="p-3">Acivity title</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <a href="">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img class="activity-image-container"  src="{{asset('image/slider_images/04.jpg')}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="p-3">Acivity title</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <a href="">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img class="activity-image-container"  src="{{asset('image/slider_images/05.jpg')}}" alt="" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="p-3">Acivity title</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection

<style scoped>
    .slider{
        height:80vh;
        background-color: black;
        align-items: center;
        background-size: cover;
        background-position: center;

    }
    #chairman_image{
        height: 150px;
        width: 150px;
        max-width: 100%;
        max-height: 100%;
    }
    .activity-image-container{
        height: 150px;
    }
</style>

