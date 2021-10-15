@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Course</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <div class="row">
                                <div class="col-md-4">

                                    <h4>Name: {{ $teachers->name }}</h4>

                                </div><!-- End Col md 4 -->

                                <div class="col-md-4">
                                    <h4>mobile: {{ $teachers->mobile }}</h4>
                                </div><!-- End Col md 4 -->

                            </div><!-- End Row -->

                         
                            <div class="row">
                                <h1>---------------------------------------------------------------------</h1>
                            </div>
                            <!-- End Row -->



                            <form action="{{ route('course.store',$teachers->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="year_id" value="{{$year_id->id}}">
                                

                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">

                                          

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Subject Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id[]" id="select" required
                                                                class="form-control">
                                                                <option value="" disabled="" selected="">Select
                                                                    Subject
                                                                </option>
                                                                @foreach($subjects as $subject)
                                                                <option value="{{$subject->id}}">
                                                                    {{$subject->subjectName}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!----//Col-6 End----->



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

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Subject Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subject_id[]" id="select" required class="form-control">
                                        <option value="" disabled="" selected="">Select
                                            Subject
                                        </option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subjectName}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!----//Col-4 End----->

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
