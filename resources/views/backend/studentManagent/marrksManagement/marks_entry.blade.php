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
                            <h4 class="box-title">Student<strong>Marsk Entry</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="post" action="{{ route('marks.entry.store') }}">
                                @csrf
                               
                               

                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID No.</th>
                                                <th width="5%">Name</th>
                                                <th width="30%">Subject Name</th>
                                                <th width="5%">Credit</th>
                                                <th width="30%">Department</th>
                                                
                                                <th width="5%">ExamType</th>
                                                <th width="10%">Marks</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($datas as $data)

                                            

                                            <tr>
                                                <td><input type="hidden" name="student_id[]" value="{{$data->student_id}}">{{$data->student_id}}</td>
                                                <td>{{$data['student']['name']}}</td>
                                                <td><input type="hidden" name="assign_subject_id[]" value="{{$data->subject_id}}">{{$data['subject']['subjectName']}}</td>
                                                <td>{{$data['subject']['credit']}}</td>
                                                <td><input type="hidden" name="department_id[]" value="{{$data->department_id}}">{{$data['group']['departmentName']}}</td>
                                                
                                                <td><input type="hidden" name="	exam_type_id[]" value="{{$examId}}">{{$examId}}</td>
                                                <td><input type="text" class="form-control form-control-sm" name="marks[]"></td>



                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <th width="5%">ID No.</th>
                                                <th width="5%">Name</th>
                                                <th width="30%">Subject Name</th>
                                                <th width="5%">Credit</th>
                                                <th width="30%">Department</th>
                                                
                                                <th width="5%">ExamType</th>
                                                <th width="10%">Marks</th>
                                        </tfoot>
                                    </table>
                                </div>















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
