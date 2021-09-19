@php

$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3>EP Deshboard</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route =='dashboard')?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
          <!-- /.User Management--->
          @if(Auth::user()->role=='Admin')
        <li class="treeview {{ ($prefix =='/users')?'active':''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
        @endif

		
          <!-- /.Profile Management--->
		  
        <li class="treeview {{($prefix=='/profile')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>View Profile</a></li>
            <li><a href="{{route('edit.password')}}"><i class="ti-more"></i>Edit Password</a></li>
           </ul>
        </li>

          <!-- /.Setup Management--->
        
        <li class="treeview {{($prefix=='/setups')?'active':''}}">
          <a href="#">
            <i data-feather="grid"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('class.view')}}"><i class="ti-more"></i>View Batch</a></li>
            <li><a href="{{route('year.view')}}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{route('department.view')}}"><i class="ti-more"></i>Department</a></li>
            <li><a href="{{route('fee.view')}}"><i class="ti-more"></i>Fee Category</a></li>
            <li><a href="{{route('fee.amount.view')}}"><i class="ti-more"></i>Fee Category Amount</a></li>
            <li><a href="{{route('examType.view')}}"><i class="ti-more"></i>Exam Type</a></li>
            <li><a href="{{route('subject.view')}}"><i class="ti-more"></i>All subjects</a></li>
            <li><a href="{{route('assign.subject.view')}}"><i class="ti-more"></i>Assign subjects</a></li>
            <li><a href="{{route('designation.view')}}"><i class="ti-more"></i>Designation</a></li>
           
           </ul>
        </li>

  <!-- /.Student Management--->

        <li class="treeview {{($prefix=='/students')?'active':''}}">
          <a href="#">
            <i data-feather="package"></i> <span>Students Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student Registation</a></li>
           </ul>
        </li>


         <!-- /.Advising--->

         <li class="treeview {{($prefix=='/advising')?'active':''}}">
          <a href="#">
            <i data-feather="package"></i> <span>Advising</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('advising.view')}}"><i class="ti-more"></i>Student Advising</a></li>
           </ul>
        </li>
      	  

        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>Alerts</a></li>
            <li><a href=""><i class="ti-more"></i>Badge</a></li>
            <li><a href=""><i class="ti-more"></i>Buttons</a></li>
            <li><a href=""><i class="ti-more"></i>Sliders</a></li>
            
          </ul>
        </li>
			
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>