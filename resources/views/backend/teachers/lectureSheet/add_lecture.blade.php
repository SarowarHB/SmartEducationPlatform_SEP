@extends('admin.admin_master')

@section('content')



<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <div class="row">


                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4>Course Name: {{ $subjects->subjectName }}</h4>
                        </div>


                    </div>
                </div> <!-- // end first col 12 -->

                
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Lecture Sheet</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">



                            <div class="col">

                                <form action="{{ route('course.lecture.store',$subjects->id)}}" method="post" enctype="multipart/form-data" >
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Lecture Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="lecture_name"
                                                                    class="form-control" required="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!----//Col-6 End----->

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Lecture File<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="file" name="file" class="form-control"
                                                                    required="">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!----//Col-3 End----->

                                                    
                                                    <!----//Col-2 End----->
                                                </div>


                                            </div>

                                        </div>
                                        <!-- /.End Row -->

                                    </div>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5"
                                            value="Submit"></input>
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

            </div>
            <!-- /.Row -->
        </section>

    </div>
</div>




@endsection
