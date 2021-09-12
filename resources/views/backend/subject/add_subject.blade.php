@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Subject</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{ route('subject.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Department Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="department_id[]" id="select" required
                                                                class="form-control">
                                                                <option value="" disabled="" selected="">Select
                                                                    Department
                                                                </option>
                                                                @foreach($department as $dep)
                                                                <option value="{{$dep->id}}">{{$dep->departmentName}}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!----//Col-4 End----->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Subject Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjectName[]" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Subject Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjectCode[]" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Credit <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="credit[]" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                                <div class="col-md-2" style="padding-top:25px;">
                                                    <span class="btn btn-success addeventmore">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </span>

                                                </div>
                                                <!----//Col-2 End----->
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.End Row -->

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


<div style="visibility:hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">

                <div class="col-12">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Department Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="department_id[]" id="select" required class="form-control">
                                        <option value="" disabled="" selected="">Select
                                            Department
                                        </option>
                                        @foreach($department as $dep)
                                        <option value="{{$dep->id}}">{{$dep->departmentName}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                        <!----//Col-4 End----->

                        <div class="col-md-2">
                            <div class="form-group">
                                <h5>Subject Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subjectName[]" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>

                            </div>

                        </div>
                        <!----//Col-2 End----->

                        <div class="col-md-2">
                            <div class="form-group">
                                <h5>Subject Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subjectCode[]" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>

                            </div>

                        </div>
                        <!----//Col-2 End----->

                        <div class="col-md-2">
                            <div class="form-group">
                                <h5>Credit <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="credit[]" class="form-control" required
                                        data-validation-required-message="This field is required">
                                </div>

                            </div>

                        </div>
                        <!----//Col-2 End----->

                        <div class="col-md-2" style="padding-top:25px;">
                            <span class="btn btn-success addeventmore">
                                <i class="fa fa-plus-circle"></i>
                            </span>

                            <span class="btn btn-danger removeeventmore">
                                <i class="fa fa-minus-circle"></i>
                            </span>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript">
    $(document).ready(function () {

        var counter = 0;
        $(document).on('click', '.addeventmore', function () {

            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest('.add_item').append(whole_extra_item_add);
            counter++;

        });

        $(document).on('click', '.removeeventmore', function () {

            $(this).closest('.delete_whole_extra_item_add').remove();
            counter -= 1;

        });

    });

</script>

@endsection
