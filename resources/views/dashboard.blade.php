
@if(!Session('login'))
<script type="text/javascript">
    window.location = "{ url('login') }";//here double curly bracket
</script>
@endif

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
		<title>Employee list</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
		<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
		<style>
	.navbar-expand-sm {
		width: 100%;
		height: 80px;
		position: fixed;
		background: #563d7c;
		top: 0;
		z-index: 1;
		display: flex;

	}
	
	.sidebar {
		width: 150px;
		height: 100%;
		position: fixed;
		background: #9276af;
		margin-top: 80px;
		z-index: 1;
		top: 0;
	}
	
	.mainbody {
		margin-left: 150px;
		margin-top: 80px;
		height: 100vh;
		background: #ced4da;
	}
	
	.leave {
		width: 80%;
		text-align: center;
		margin: auto;
		margin-top: 5;
	}
	
	.applyleave {
		text-align: right;
	}
	
	.registerbutton {
		text-align: right;
	}
	
	.img {
		margin-right: 20px;
		border-radius: 50%;
		width: 50px;
	}
	
	.profile {
		position: fixed;
    	right: 100px;
		margin-top: 15px;
		float: right;
		color: white;
	}
	
	.logoutbtn {
		margin-top: 18px;
		margin-left:15px;
		/* float:right; */
		/* color: white; */
	}
	
	.container {
		height: 100%;
	}
	
	.actionThWidth {
		min-width: 180px;
	}
	.dropdown-menu{
		right: 0;
		left: unset;
		top: 52px;
	}
	</style>
</head>

<body>
	<div class="header">
		<nav class="navbar navbar-dark navbar-expand-sm">
			<div class="logoImg">
				<img src="images/logos/kandidlogo.png" width="130" height="30">
			</div>
			<div class="collapse navbar-collapse" id="navbar-list-4" style=" display: inline !important; ">
				<div class="profile" > Hello! {{Session('name')}} </div>
					<ul class="navbar-nav "  style=" display: inline !important; float: right;">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline !important;float: right;">
								<img src="images/{{Session('userImg')}}" width="40" height="40" class="rounded-circle">
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="editUser"><i class="fa fa-pencil fa-lg"></i> Edit Profile</a>
								<a class="dropdown-item" href="logout"><i class="fa fa-sign-out fa-lg"></i> Log Out</a>
							</div>
						</li>   
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<!-- </div> -->
	<div class="sidebar ">
		<button class="form-control btn-dark mt-3 leave">Leave</button>
	</div>
	<div class="mainbody ">
		<div class="container col-10">
			<h1>Leave balance</h1>
			<div class="table-responsive">
				<table class="table table-bordered table-striped ">
					<thead class="thead-dark">
						<tr>
							<th>Total leave</th>
							<th>Emergency leave</th>
							<th>Casual leave</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td> </td>
							<td> </td>
							<td> </td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- <button class="btn btn-success applyleave" type="button" data-target="#leaveStatus" data-toggle="modal" >Apply for leave</button> -->
			<div class="applyleave">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Apply for leave </button>
			</div>
			<h1>Leave Status</h1>
			<div class="table-responsive">
				<table id="leaveStatus" class="table table-bordered table-striped">
					<thead class="thead-dark">
						<tr>
							<!-- <th scope="col">S.no</th> -->
							<th>S.no</th>
							<th>From</th>
							<th>To</th>
							<th>Total days</th>
							<th>Applied date</th>
							<th>Comment</th>
							<th>Status</th>
							<th>Reason</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php
							$id = 1;
						@endphp
						@foreach($leavestatus as $leavedetails)
						<tr>
							<td> {{ $id ++}}</td>
							<td> {{$leavedetails->fromDate}}</td>
							<td> {{$leavedetails->toDate}}</td>
							<td> {{$leavedetails->totalDays}}</td>
							<td> {{$leavedetails->appliedDate}}</td>
							<td> {{$leavedetails->comment}}</td>
							<td> {{$leavedetails->status}}</td>
							<td> {{$leavedetails->reason}}</td>
							@if($leavedetails->status == 'Pending')
								<td> <a href="deleteLeaves/{{$leavedetails->id}}" class="btn btn-danger">Cancel</a></td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	
		<!-- Modal -->
		<form action="updateLeaves" method="post">
			@csrf
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Apply For Leave</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-6">
									<label for="fromdate">From:</label>
									<input type="date" class="form-control readonly" id="fromdate" name="fromdate" placeholder="From" autocomplete="off" required> 
								</div>
								<div class="col-6">
									<label for="todate">To:</label>
									<input type="date" class="form-control readonly" id="todate" name="todate" placeholder="To" autocomplete="off" required> 
								</div> <small class="ml-3" id='emerLeaveMessage'></small> 
							</div>
							<div class="row">
								<div class="col-12">
									<label>Leave Type:</label>
									<div class="dropdown">
										<select id="leavetype" name="leavetype" class="form-control" required>
											<option value="Full day">Full Day</option>
											<optgroup label="Half Day">
												<option value="First half">First half</option>
												<option value="Second half">Second Half</option>
											</optgroup>
										</select>
										<!-- <select><option value="">1</option><option value="">2</option></select> -->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<label>Comment:</label>
									<!-- <input type="textarea" class="form-control" name="dob" value="" placeholder="Your comment here..." autocomplete="off"> -->
									<textarea class="form-control" name="comment" id="" cols="6" rows="3" required></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="leavestatus" class="btn btn-primary">Apply</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
			
			$('#leaveStatus').DataTable();
		});
	</script>
</body>
</html>