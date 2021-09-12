@extends('admin.admin_master')

@section('content')


<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Subject</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{url('setups/update/subject/'.$data['0']->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="add_item">

                                            <div class="form-group">
                                                <h5>Department Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="department_id[]" id="select" required
                                                        class="form-control">
                                                        <option value="" disabled="" selected="">Select
                                                            Department
                                                        </option>
                                                        @foreach($department as $dep)
                                                        <option value="{{$dep->id}}" {{($data['0']->department_id==$dep->id)?
                                                                 "selected":""}}>{{$dep->departmentName}}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <!----//form Group End----->

                                            <div class="row">


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Subject Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjectName[]"
                                                                value="{{$data['0']->subjectName}}" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Subject Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="subjectCode[]" value="{{$data['0']->subjectCode}}" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Credit <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="credit[]" value="{{$data['0']->credit}}" class="form-control"
                                                                required
                                                                data-validation-required-message="This field is required">
                                                        </div>

                                                    </div>

                                                </div>
                                                <!----//Col-2 End----->

                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.End Row -->

                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update"></input>
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
