@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{route('user.store')}}" method="post" >
                                @csrf

                                <input type="hidden" name="usertype" value="admin">
                                <div class="row">
                                    <div class="col-6">



                                        <div class="form-group">
                                            <h5>User Role Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role" id="select" required class="form-control">
                                                    <option value="" disabled="" selected="">Select Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Accountant">Accountant</option>
                                                    <option value="Teacher">Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>

                                        </div>




                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>
                                        </div>
                                        
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit"></input>
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
