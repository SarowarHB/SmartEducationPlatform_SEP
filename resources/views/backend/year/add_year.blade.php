@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Year</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{route('year.store')}}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-6">



                                     
                                        <div class="form-group">
                                            <h5>Year Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="yearName" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>

                                        </div>




                                    </div>
                                    
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit"></input>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</div>

@endsection
