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
                            <h3 class="box-title">Subjects List</h3>
                            <a href="{{route('subject.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Subject</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL No.</th>
                                            <th width="25%">Subject Name</th>
                                            <th width="10%">Subject Code</th>
                                            <th width="10%">Credit</th>
                                            <th width="30%">Department</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($data as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$user->subjectName}}</td>
                                            <td>{{$user->subjectCode}}</td>
                                            <td>{{$user->credit}}</td>
                                            <td>{{$user['student_department']['departmentName']}}</td>
                                            <td>
                                                <a href="{{url('setups/edit/subject/'.$user->id)}}" class="btn btn-info ">Edit</a>
                                                <a href="{{url('setups/delete/subject/'.$user->id)}}" class=" btn btn-danger " id="delete">Delete</a>
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <th width="5%">SL No.</th>
                                            <th width="25%">Subject Name</th>
                                            <th width="10%">Subject Code</th>
                                            <th width="10%">Credit</th>
                                            <th width="30%">Department</th>
                                            <th width="20%">Action</th>
                                        </tr>
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
