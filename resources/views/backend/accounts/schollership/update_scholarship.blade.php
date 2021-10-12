@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"> Student Scholarship Information Update </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <div class="row">
                            <div class="col-md-4">

                              <h4>Name: {{ $editData['student']['name'] }}</h4>

                            </div><!-- End Col md 4 -->
                            
                            <div class="col-md-4">
                               <h4>Id Number: {{ $editData['student']['id_no'] }}</h4>
                            </div><!-- End Col md 4 -->

                            <div class="col-md-12">
                               <h1>--------------------------------------------------------------------</h1>
                            </div><!-- End Col md 4 -->
                            </div> 
                            <!-- End Row -->

                            <form method="post"
                                action="{{ route('scholarship.update.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editData->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <!-- 1st Row -->
                                                        
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Discount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" class="form-control"
                                                            required="" value="{{ $editData['discount']['discount'] }}">
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


                                        </div> <!-- End 1st Row -->


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                value="Update">
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
