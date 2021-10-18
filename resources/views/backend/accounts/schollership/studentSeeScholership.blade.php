@extends('admin.admin_master')

@section('content')




<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">

                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{url('upload/sep.png') }}" style="width: 100px; width: 100px;">
                                </div><!-- End Col md 4 -->
                                <div class="col-md-6">
                                    
                                    <h2> <b>Student Scholarship Information </b> </h2>
                                </div><!-- End Col md 8 -->
                            </div> <!-- End row-->

                            <br></br>
                            <!-- End row-->

                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Name: {{ $editData['student']['name'] }}</h4>
                                </div><!-- End Col md 4 -->

                                <div class="col-md-8">
                                    <h4>Id Number: {{ $editData['student']['id_no'] }}</h4>
                                </div><!-- End Col md 4 -->

                            </div><!-- End Row -->


                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Batch: {{ $editData['student_class']['className'] }}</h4>
                                </div><!-- End Col md 4 -->

                                <div class="col-md-8">
                                    <h4>Department: {{ $editData['group']['departmentName'] }}</h4>
                                </div><!-- End Col md 4 -->

                            </div><!-- End Row -->
                            <br></br>
                            <br></br>

                            <div class="row">
                                <div class="col-md-12">
                                <strong><h3>Current Semester Waiver = {{$editData['discount']['discount'] }}%</h3></strong>
                                </div>
                            </div>

                            
                            <!-- End Row -->
                        </div>



                        

                        <!-- /.box-header -->







                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>



            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>


@endsection
