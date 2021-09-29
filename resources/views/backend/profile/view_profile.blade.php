@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <div class="row">
                <div class="col-12">

                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black">
                            <h3 class="widget-user-username">User Name:{{$data->name}}</h3>
                            <a href="{{route('edit.profile')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                            <h6 class="widget-user-desc">Desigation:{{$data->usertype}}</h6>
                            <h6 class="widget-user-desc">Email:{{$data->email}}</h6>
                        </div>
                        <div class="widget-user-image">

                        @if(Auth::user()->role=='Student')
                            <img class="rounded-circle" src="{{(!empty($data->image)) ? url('upload/student_images/'.$data->image):url('upload/no_image.jpg')}}" alt="User Avatar">
                  
                            @else
                            <img class="rounded-circle" src="{{(!empty($data->image)) ? url('upload/user_images/'.$data->image):url('upload/no_image.jpg')}}" alt="User Avatar">
                        @endif
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Mobile</h5>
                                        <span class="description-text">{{$data->mobile}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">Address</h5>
                                        <span class="description-text">{{$data->address}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{$data->gender}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>





                </div>

            </div>


        </section>

    </div>
</div>

@endsection
