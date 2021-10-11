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
                                    <p> <b>Student Registration Fee </b> </p>
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



                        <div class="box-body">

                            @foreach($data as $datas)

                            <h2> {{$datas['student_year']['yearName'] }}</h2>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">Installment No.</th>
                                            <th width="5%">pay Ammount</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @php
                                        $total_credit = 0;
                                        $total_fee = 0;
                                        $total_payment = 0;
                                        $k=1;
                                        @endphp




                                        @foreach($paymentamount as $pdata)

                                        @if($datas['student_year']['id']==$pdata->year_id )

                                        <tr>
                                            <td>{{$k++}}</td>

                                            <td>{{ $pdata->amount }}</td>

                                        </tr>
                                        @endif
                                        @endforeach


                                    </tbody>

                                </table>

                            </div>
                            @endforeach

                        </div>

                        <!-- /.box-header -->







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
