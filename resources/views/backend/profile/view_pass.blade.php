@extends('admin.admin_master')

@section('content')


<div class="content-wrapper">
    <div class="container-full">


        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Password</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">


                            <form action="{{ route('store.password') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input name="oldpassword" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    id="current_password" type="password"
                                                    wire:model.defer="state.current_password"
                                                    autocomplete="current-password">
                                                @error('oldpassword')

                                                <span class="text-danger">{{$message}}</span>

                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input name="password" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    id="password" type="password" wire:model.defer="state.password"
                                                    autocomplete="new-password">

                                                @error('password')

                                                <span class="text-danger">{{$message}}</span>

                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input name="password_confirmation" class="form-control" required
                                                    data-validation-required-message="This field is required"
                                                    id="password_confirmation" type="password"
                                                    wire:model.defer="state.password_confirmation"
                                                    autocomplete="new-password">

                                                @error('password_confirmation')

                                                <span class="text-danger">{{$message}}</span>

                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                    <!-- /.col-6 end -->

                                </div>



                                <div class=" text-xs-right">
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

<!-- /.Autometic Image Loader -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

    });

</script>

@endsection
