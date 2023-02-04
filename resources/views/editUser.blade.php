<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register employee</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	

    <style>
      .error{
        color:red;
      }
	  .backBtn{
		padding: 10px;
		position:fixed;
	  }
    </style>
    </head>
    <body>
	<div class="backBtn">
          <button type="button" class="btn btn-danger" onclick="location.href='dashboard'"><i class="fa fa-arrow-left"></i> Back to leaves</button>
        </div>
    <div class="container col-lg-6 col-xs-10 mt-3">
	<form id="myform" action="editUserDetails" method="post" enctype="multipart/form-data">
		@csrf
		<h1 class='mb-5'>Edit Employee</h1>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label class="text">Emp ID</label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" value="{{session('id')}}" name="empId" id="empId" readonly>
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label class="text">First Name<font color="red">*</font></label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" value="{{ $userDetails->firstname }}" name="fname" id="fnames" placeholder="Enter your first name" autocomplete="off">
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label>Last Name<font color="red">*</font></label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<input type="text" class="form-control" value="{{ $userDetails->lastname }}" name="lname" id="lnames" placeholder="Enter your last name" autocomplete="off">
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label>Email-Address<font color="red">*</font></label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<input type="email" class="form-control" value="{{ $userDetails->email }}" name="email" id="emails" placeholder="Enter E-mail" autocomplete="off">
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label>Mobile<font color="red">*</font></label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<input type="number" class="form-control" value="{{ $userDetails->mobile }}" name="mobile" id="mobiles" placeholder="Mobile no" autocomplete="off">
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label>Date of Join<font color="red">*</font></label>
			</div>
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<div class="input-group">
					<input type="date" class="form-control" name="doj" value="{{$userDetails->doj}}" autocomplete="off">
					<!-- <div class="input-group-append">
						<label class="input-group-text" for="datepicker"><i class="fa fa-calendar"></i>
						</label>
					</div> -->
				</div>
			</div>
		</div>
		<div class='row'>
			<div class="form-group col-sm-3 col-md-3 col-lg-3">
				<label for="designation">Designation<font color="red">*</font>
				</label>
			</div>
	
			<div class="form-group col-sm-9 col-md-9 col-lg-9">
				<select id="designation" name="designation" class="form-control">
					<option selected></option>
					<option value="sDeveloper" @if( $userDetails->designation  == 'sDeveloper') selected @endif > Senior Developer</option>
					<option value="jDeveloper"  @if( $userDetails->designation  == 'jDeveloper') selected @endif > Junior Developer</option>
					<option value="sEngineer"  @if( $userDetails->designation  == 'sEngineer') selected @endif > Software Engineer</option>
					<option value="tester"  @if( $userDetails->designation  == 'tester') selected @endif > Tester</option>
				</select>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-3 col-md-3 col-lg-3'>
				<label>Upload your photo<font color="red">*</font>
				</label>
			</div>
			<div class="form-check col-sm-9 col-md-9 col-lg-9">
                <input class="form-control form-control-sm" type="file" name="userImg" id="userImg" accept="image/png, image/gif, image/jpeg">
                <input class="form-control form-control-sm" id="oldImage" type="hidden" name="oldImage" value="">
                <small>**file size min 1MB & format(.jpg,.jpeg,.png)</small>
			</div>
		</div>
		<br>
		
      <div class='row'>
        
        <div class="col-sm-6 col-md-6 col-lg-6">
          <button type="submit" name="updated" class="btn btn-success btn-block">Submit</button>
        </div>
		  </div>
		<br>
		
	</form>

</div>
    
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
	$('#datepicker').datepicker({
    	autoclose: true,
	});
</script>
  </body>
</html>