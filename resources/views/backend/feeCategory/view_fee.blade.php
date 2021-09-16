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
                            <h3 class="box-title">Fee Categoy List</h3>
                            <a href="{{route('fee.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add FeeCategory</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="20%">SL No.</th>
                                            <th width="40%">Fee Categoy Name</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($data as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$user->feeName}}</td>
                                            <td>
                                                <a href="{{url('setups/edit/fee/'.$user->id)}}" class="btn btn-info ">Edit</a>
                                                <a href="{{url('setups/delete/fee/'.$user->id)}}" class=" btn btn-danger " id="delete">Delete</a>
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th width="20%">SL No.</th>
                                            <th width="50%">Fee Categoy Name</th>
                                            <th width="30%">Action</th>
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
