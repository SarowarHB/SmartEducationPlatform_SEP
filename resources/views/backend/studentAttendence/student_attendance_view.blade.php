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
                            <h3 class="box-title">Student Attendance List </h3>

                            <a href="{{ route('student.find') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5"> Add Attendance </a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Subject name </th>
                                            <th>Date</th>
                                            <th width="20%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $value['assign_subject']['subjectName'] }}</td>
                                            <td> {{ $value->date }}</td>

                                            <td>
                                                <a href="{{ route('student.attendance.edit',$value->subject_id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('student.attendance.details',$value->subject_id) }}"
                                                    class="btn btn-danger">Details</a>

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


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>





@endsection
