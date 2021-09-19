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
                    <h4 class="box-title"> Student Promotion </h4>

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

                            </div> 
                            <!-- End Row -->

                            <form method="post"
                                action="{{ route('promotion.student.registration',$editData->student_id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editData->id }}">
                                <div class="row">
                                    <div class="col-12">



                                        <div class="row">
                                            <!-- 1st Row -->
                                                        

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach($years as $year)
                                                            <option value="{{ $year->id }}"
                                                                {{ ($editData->year_id == $year->id)? "selected":"" }}>
                                                                {{ $year->yearName }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                            </div> <!-- End Col md 4 -->


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
                                                value="Promotion">
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>



@endsection
