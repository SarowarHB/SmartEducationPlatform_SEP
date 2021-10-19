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
				  <h3 class="box-title">Class Routine </h3><br></br>
				  <h3 class="box-title">Batch:{{ $alldata['student_class']['className']}} </h3>
	                

				</div>
				
			
                <img src="{{ (!empty($alldata->file))? url('upload/classRoutine/'.$alldata->file):url('upload/no_image.jpg') }}"
                                            style="width: 100%; height: 85%;">

                
							 
						
			  </div>
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
