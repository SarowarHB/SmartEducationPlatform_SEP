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
                            <h3 class="box-title">Lectures <strong>View</strong></h3>
                        </div>

                        
                    </div>
                </div> <!-- // end first col 12 -->


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Lectures List</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Lecture Name</th>
                                            <th width="20%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lectures as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $value->lecture_name }}</td>
                                            <td>                                                     
                                                <a target="View Course" title="Details"
                                                    href="{{ route('student.course.lecture.view',$value->id) }}"
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
