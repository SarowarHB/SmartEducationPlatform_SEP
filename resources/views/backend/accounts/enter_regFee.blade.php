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
                                <div class="col-md-4">
                                    <img src="{{url('upload/sep.png') }}" style="width: 100px; width: 100px;">
                                </div><!-- End Col md 4 -->
                                <div class="col-md-8">
                                    <h2>SEP ERP</h2>
                                    <p> <b>Student Registration Fee </b> </p>
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

                            <div class="row">
                                <h1>---------------------------------------------------------------------</h1>
                            </div>
                            <!-- End Row -->
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                        <form method="post" action="{{ route('registration.fee.store') }}">
                                @csrf
                                <div class="row">
            

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Registration Fee</h5> <span class="text-danger"> </span></h5>
                                           <h4> Fee Amount: {{ $amounts['student_class']['className'] }} </h4>
                                            <div class="controls">
                                                <input type="text" name="amount" class="form-control" required
                                                    data-validation-required-message="This field is required" > </div>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->







                                <div class="col-md-3">

                                    <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                </div> <!-- End Col md 3 -->
                             </div><!--  end row -->


                        <!--  ////////////////// Mark Entry table /////////////  -->





                        </form>

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
