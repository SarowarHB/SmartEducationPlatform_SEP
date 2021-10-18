@extends('admin.admin_master')

@section('content')

@if(Auth::user()->role=='Student'||Auth::user()->role=='Teacher')

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

@else
<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Students</p>
                                <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i
                                            class="fa fa-caret-up"></i> +2.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-home"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Department</p>
                                <h3 class="text-white mb-0 font-weight-500">15 <small class="text-success"><i
                                            class="fa fa-caret-up"></i> +0.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Student Passed</p>
                                <h3 class="text-white mb-0 font-weight-500">10,250  <small class="text-success"><i
                                            class="fa fa-caret-up"></i> +3.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Total Employes</p>
                                <h3 class="text-white mb-0 font-weight-500">4,460  <small class="text-success"><i
                                            class="fa fa-caret-up"></i> +1.5%</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endif

@endsection
