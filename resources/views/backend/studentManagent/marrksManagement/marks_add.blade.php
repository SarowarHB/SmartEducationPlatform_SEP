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
                            <h4 class="box-title">Student <strong>Marsk Entry</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="post" action="{{ route('marks.entry') }}">
                                @csrf
                                <div class="row">



                                    <div class="col-md-3">

                                    <div class="form-group">
                                            <h5>Year <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->yearName }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->




                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Class <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" required="" class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->className }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Subject <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="subject_id" id="assign_subject_id" required=""
                                                    class="form-control">
                                                    <option selected="">Select Subject</option>
                                                    @foreach($all_subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->subjectName }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->


                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <h5>Exam Type <span class="text-danger"> </span></h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" required=""
                                                    class="form-control">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($exam_types as $exam)
                                                    <option value="{{ $exam->id }}">{{ $exam->examName }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div> <!-- End Col md 3 -->





                                    <div class=" text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                    value="Add Marks"></input>
                                            </div>
                                </div><!--  end row -->
                

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
