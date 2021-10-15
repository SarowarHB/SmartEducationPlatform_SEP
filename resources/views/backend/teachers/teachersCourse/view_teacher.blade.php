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
                            <h4 class="box-title">Teachers <strong>View</strong></h4>
                        </div>

                        
                    </div>
                </div> <!-- // end first col 12 -->


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Teachers List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Image</th>
                                            @if(Auth::user()->role == "Admin")
                                            <th>Code</th>
                                            @endif
                                            <th width="20%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teachers as $key => $value )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td> {{ $value->name }}</td>
                                            <td> {{ $value->mobile }}</td>
                                            
                                            <td>
                                          
                                                    <img src="{{(!empty($value->image)) ? url('upload/user_images/'.$value->image):url('upload/no_image.jpg')}}"
                                                    style="width: 60px; width: 60px; alt="User Avatar">
                                            </td>
                                            <td> {{ $value->code }}</td>
                                            <td>
                                                

                                                <a title="Add Course"
                                                    href="{{ route('teacher.course.add',$value->id) }}"
                                                    class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></a>

                                                <a target="View Course" title="Details"
                                                    href="{{ route('teacher.course.details',$value->id) }}"
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
