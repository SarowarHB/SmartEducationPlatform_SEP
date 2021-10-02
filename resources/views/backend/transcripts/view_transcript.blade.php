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

                            

                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th width="5%">ID</th>
                                                <th width="5%">Exam id</th>
                                                <th width="10%">Marks</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($demo as $data)

                                            

                                            <tr>
                                              
                                                <td>{{$data->student_id}}</td>
                                                <td>{{$data->exam_type_id}}</td>
                                                <td>{{$data->marks}}</td>
                                               
                                                
                                                



                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <th width="5%">ID</th>
                                                <th width="5%">Exam id</th>
                                                <th width="10%">Marks</th>
                                        </tfoot>
                                    </table>
                                </div>















                               
                        </div><!--  end row -->


                        


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>


@endsection
