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
				  <h3 class="box-title">Class Routine List </h3>
	<a href="{{ route('class.routine.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add New Routine</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Batch Name</th> 
				<th>Department Name</th>
				<th>Year Name</th>
                <th width="20%">File</th>
				<th width="20%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($class_routines as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value['student_class']['className']}}</td>	
				<td> {{ $value['student_year']['yearName']}}</td>	
                <td> {{ $value['group']['departmentName']}}</td>	
				<td> 
                <img src="{{ (!empty($value->file))? url('upload/classRoutine/'.$value->file):url('upload/no_image.jpg') }}"
                                            style="width: 100px; width: 100px;">

                </td>
				 		 
				<td>
                   <a href="{{ route('class.routine.edit',$value->id) }}" class="btn btn-info">Edit</a>
                  
                   

                       <a href="{{ route('class.routine.details',$value->id) }}" class="btn btn-danger">Details</a>

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

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
