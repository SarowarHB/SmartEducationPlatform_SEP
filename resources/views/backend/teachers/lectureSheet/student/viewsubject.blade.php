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
                            <h4 class="box-title">Courses <strong>View</strong></h4>
                        </div>

                        
                    </div>
                </div> <!-- // end first col 12 -->


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Course List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Course Credit</th>
                                            <th width="20%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $value['subject']['subjectName'] }}</td>
                                            <td> {{ $value['subject']['subjectCode'] }}</td>
                                            <td> {{ $value['subject']['credit'] }}</td>
                                            <td>

                                                <a target="View Class Sheet" title="Details"
                                                    href="{{ route('student.course.lecture.details',$value->subject_id) }}"
                                                    class="btn btn-danger"><i class="fa fa-eye"></i></a>

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>
@endsection
