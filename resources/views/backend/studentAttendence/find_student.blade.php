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
                            <h4 class="box-title">Student <strong>Attendance</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="post" action="{{ route('student.attendance.add') }}">
                                @csrf
                                <div class="row">


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Semester <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id"  required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}">
                                                        {{ $year->yearName}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Subject <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="subject_id"  required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Subject</option>
                                                    @foreach($subjects as $subject)
                                                    <option value="{{ $subject->subject_id }}">
                                                        {{ $subject['subject']['subjectName']}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->

                                </div><!--  end row -->

                                <br></br>

                                <div class="row">
                                    <div class="col-md-3">

                                        <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                    </div> <!-- End Col md 3 -->
                                </div>
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
