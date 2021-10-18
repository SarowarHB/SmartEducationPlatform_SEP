@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Class <strong>Routine Add</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="post" action="{{route('class.routine.update',$alldata->id)}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">

 
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Department <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="dep_id" id="id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Department</option>
                                                    @foreach($all_departments as $department)
                                                    <option value="{{ $department->id }}"{{ ($alldata->department_id == $department->id)? "selected":"" }}>{{ $department->departmentName}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Batch <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($classes as $class)
                                                    <option value="{{ $class->id }}" {{ ($alldata->class_id == $class->id)? "selected":"" }}>{{ $class->className}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->

                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Year <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}" {{ ($alldata->year_id == $year->id)? "selected":"" }}>{{ $year->yearName}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->



                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Add Routine</h5> <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                            <input type="file" name="file" class="form-control" required
                                                    data-validation-required-message="This field is required" value="{{$alldata->file}}"> </div>
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>


@endsection