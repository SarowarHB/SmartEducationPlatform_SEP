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

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{url('upload/sep.png') }}" style="width: 100px; width: 100px;">
                                </div><!-- End Col md 4 -->
                                <div class="col-md-8">
                                    <h2>SEP ERP</h2>
                                    <p> <b>Student Result Report </b> </p>
                                </div><!-- End Col md 8 -->
                            </div> <!-- End row-->

                            <br></br>
                            <!-- End row-->

                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Name: {{ $editData['student']['name'] }}</h4>
                                </div><!-- End Col md 4 -->

                                <div class="col-md-8">
                                    <h4>Id Number: {{ $editData['student']['id_no'] }}</h4>
                                </div><!-- End Col md 4 -->

                            </div><!-- End Row -->


                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Batch: {{ $editData['student_class']['className'] }}</h4>
                                </div><!-- End Col md 4 -->

                                <div class="col-md-8">
                                    <h4>Department: {{ $editData['group']['departmentName'] }}</h4>
                                </div><!-- End Col md 4 -->

                            </div><!-- End Row -->

                            <div class="row">
                                <h1>---------------------------------------------------------------------</h1>
                            </div>
                            <!-- End Row -->
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            @foreach($data as $datas)

                            <h2> {{$datas['exam_type']['examName'] }}</h2>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">COURSE CODE</th>
                                            <th width="15%">COURSE NAME</th>
                                            <th width="5%">COURSE CREDIT</th>
                                            <th width="5%">GRADE</th>
                                            <th width="5%">GP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_marks = 0;
                                        $total_point = 0;
                                        $total_credit = 0;
                                        $gpa =0;
                                        @endphp


                                        @foreach($demo as $data)

                                        @if($datas['exam_type']['id']==$data->exam_type_id )
                                        <tr>
                                            <td>{{$data['assign_subject']['subjectCode']}}</td>
                                            <td>{{$data['assign_subject']['subjectName']}}</td>
                                            <td>{{$data['assign_subject']['credit']}}</td>

                                            @php

                                            $get_mark = $data->marks;
                                            $grade_marks = App\Models\MarksGrade::where([['start_marks','<=',
                                                (int)$get_mark],['end_marks', '>=' ,(int)$get_mark ]])->first();
                                                $grade_name = $grade_marks->grade_name;
                                                $grade_point = number_format((float)$grade_marks->grade_point*$data['assign_subject']['credit'],2);
                                                $total_point = (float)$total_point+(float)$grade_point;
                                                $total_credit = $total_credit+$data['assign_subject']['credit'];

                                                @endphp

                                                <td>{{ $grade_name }}</td>
                                                <td>{{ $grade_point}}</td>





                                        </tr>
                                        @endif
                                        @endforeach

                                        @php
                                        $gpa = 0;
                                        $gpa = (float)$total_point/(float)$total_credit;

                                        @endphp


                                        <tr >

                                            <td colspan="4" >GPA</td>
                                            <td>={{number_format((float)$gpa,2)}}</td>
                                        </tr>
                                        <tr>

                                            <td colspan="4">Total Credit</td>
                                            <td>={{$total_credit}}</td>
                                        </tr>



                                    </tbody>

                                </table>
                            </div>
                            @endforeach
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>



                <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>


@endsection
