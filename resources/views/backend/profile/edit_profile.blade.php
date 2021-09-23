@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


                            <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">

                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->email}}"> </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->name}}"> </div>

                                        </div>
                                        <div class="form-group">
                                            <h5>Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->mobile}}"> </div>

                                        </div>

                                        <div class="form-group">
                                            <h5>User Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->image}}"> </div>

                                        </div>


                                    </div>

                                    <!-- /.col-6 end -->

                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>User Role Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="usertype" id="select" required class="form-control">
                                                <option value="" disabled="" selected="">Select Role</option>
                                                    <option value="Admin" {{($data->usertype == "Admin" ? "selected" : "")}}>Admin</option>
                                                    <option value="Student" {{($data->usertype == "Student" ? "selected" : "")}} >Student</option>
                                                    <option value="Acountent" {{($data->usertype == "Accountant" ? "selected" : "")}} >Accountant</option>
                                                    <option value="Teacher" {{($data->usertype == "Teacher" ? "selected" : "")}}>Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="gender" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->gender}}"> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    value="{{$data->address}}"> </div>

                                        </div>

                                        <div class="form-group">
                                            <h5>Disply Image</h5>
                                            <div class="controls">
                                               


                                                    @if(Auth::user()->role=='')
                            <img id="showImage" src="{{(!empty($data->image)) ? url('upload/student_images/'.$data->image):url('upload/no_image.jpg')}}"  style="width:100px; height:100px; border:1px; solid #000000; "
                                                    alt="User Avatar"">
                  
                            @else
                            <img id="showImage" src="{{(!empty($data->image)) ? url('upload/user_images/'.$data->image):url('upload/no_image.jpg')}}"  style="width:100px; height:100px; border:1px; solid #000000; "
                                                    alt="User Avatar"">
                        @endif
                                                 </div>

                                        </div>




                                    </div>



                                </div>



                                <div class=" text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                    value="Update"></input>
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

<!-- /.Autometic Image Loader -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

    });

</script>

@endsection
