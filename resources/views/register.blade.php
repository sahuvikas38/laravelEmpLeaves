<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container col-6 mt-5 ">
    <form action="users" method="post"> 
        @csrf
        <h1 class="mb-5">Registration Form</h1>
        
        <div class='row'>
			<div class="form-group col-4">
				<label>Name</label>
			</div>
			<div class="form-group col-8">
				<input type="text" class="form-control"  name="name" id="name" placeholder="Enter Name" autocomplete="off" required>
			</div>
		</div>
        <div class='row mt-3'>
			<div class="form-group col-4">
				<label>Mobile no.</label>
			</div>
			<div class="form-group col-8">
				<input type="number" class="form-control"  name="mobile" id="mobile" placeholder="Enter Mobile" autocomplete="off" required>
			</div>
		</div>
        <div class='row mt-3'>
            <div class="form-group col-4">
                <label>Email/Emp ID</label>
            </div>
            <div class="form-group col-8">
                <input type="text" class="form-control"  name="email" id="email" placeholder="Email / Emp id" autocomplete="off" required>
            </div>
        </div>
		<div class='row mt-3'>
			<div class="form-group col-4">
				<label>Password</label>
			</div>
			<div class="form-group col-8">
				<input type="password" class="form-control"  name="password" id="password" placeholder="Password" autocomplete="off" required>
			</div>
		</div>
        <div class="row mt-5">
            <div class="col-sm-6">
                <button type="submit" name="save" class="btn btn-success btn-block" >Register</button>
            </div>
            <div class="col-sm-6">
                <a href="login" class="btn btn-secondary btn-block" >Back to login</a>
            </div>
        </div>
    </form>
    </div>
    
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="jqueryvalidation.js"></script> -->
    <!-- <script type="text/javascript" src="additionalmethodjquery.js"></script> -->
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="myscript.js"></script> -->

</body>
</html>