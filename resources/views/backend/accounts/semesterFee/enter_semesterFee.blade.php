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


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">SEMESTER NAME</th>
                                            <th width="5%">TOTAL COURSE CREDIT</th>
                                            <th width="5%">Ammount/credit</th>
                                            <th width="5%">Total Fee</th>
                                            <th width="5%">Total Payment</th>
                                            <th width="5%">Payment Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    
                                    @php
                                        $total_credit = 0;
                                        $total_fee = 0;
                                        $total_payment = 0;
                                        $total_discount = 0;
                                        $total_discountAmount = 0;
                                    @endphp





                                        <tr>
                                            <td>{{$editData['student_year']['yearName']}}</td>
                                            @foreach($studentData as $data)

                                            @php
                                            $total_credit=$total_credit+$data['subject']['credit'];
                                            @endphp
                                            @endforeach
                                            <td>{{ $total_credit }} </td>

                                            <td>{{ $amounts }}</td>

                                            @php
                                            $total_fee=$total_credit*$amounts;
                                            if($editData['discount']['discount'] !=0)
                                            {
                                                $total_discount=(float)$editData['discount']['discount']/(float)100;
                                                $total_discountAmount=(float)$total_fee*(float)$total_discount;
                                                $total_fee=(float)$total_fee-(float)$total_discountAmount;


                                            }
                                            @endphp
                                            <td>{{ $total_fee+1000 }}</td>

                                            @if($paymentamount != NULL) {

                                            @foreach($paymentamount as $pdata)

                                            @php
                                            $total_payment=$total_payment+$pdata->amount;
                                            @endphp
                                            @endforeach
                                            <td>{{$total_payment}}</td>
                                            <td>{{$total_fee+1000-$total_payment}}</td>
                                            }

                                            @else {
                                            <td>{{$total_payment}}</td>
                                            <td>{{$total_fee}}</td>
                                            }

                                            @endif





                                        </tr>






                                    </tbody>

                                </table>
                            </div>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{ route('semester.fee.store') }}">
                                @csrf
                                <input type="hidden" name="student_id" value="{{$std_id}}">
                                <input type="hidden" name="id_no" value="{{$id_no}}">
                                <input type="hidden" name="year_id" value="{{$year_id}}">
                                <input type="hidden" name="class_id" value="{{$class_id}}">
                                <input type="hidden" name="department_id" value="{{$department_id}}">
                                <div class="row">


                                    <div class="col-md-3">



                                        <div class="form-group">
                                            <h5>Payment Amount</h5> <span class="text-danger"> </span></h5>

                                            <div class="controls">
                                                <input type="text" name="amount" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->







                                <div class="col-md-3">

                                    <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                </div> <!-- End Col md 3 -->
                        </div><!--  end row -->


                        <!--  ////////////////// Mark Entry table /////////////  -->





                        </form>

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
