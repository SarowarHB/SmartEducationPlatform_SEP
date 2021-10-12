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
                            <h3 class="box-title">Last Date Of Current Installment : </h3>
                            <a href="{{route('update.date')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Update Date</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                               <h2>{{date('d-m-Y', strtotime($last_date->last_Date))}}</h2>
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
