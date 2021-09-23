@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit User</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{url('users/update/'.$data->id)}}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-6">



                                        <div class="form-group">
                                            <h5>User Role Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role" id="role" required class="form-control">
                                                    <option value="" disabled="" selected="">Select Role</option>
                                                    <option value="Admin" {{($data->role == "Admin" ? "selected" : "")}}>Admin</option>                 
                                                    <option value="Accounted" {{($data->role == "Accountant" ? "selected" : "")}} >Accountant</option>
                                                    <option value="Teacher" {{($data->role == "Teacher" ? "selected" : "")}}>Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required
                                                    data-validation-required-message="This field is required" value="{{$data->name}}"> </div>

                                        </div>




                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required
                                                    data-validation-required-message="This field is required" value="{{$data->email}}"> </div>
                                        </div>
                                        
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update"></input>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</div>

@endsection
