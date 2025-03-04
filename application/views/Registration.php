<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style>
		.login-form {
			max-width: 600px;
			margin: auto;
			padding: 15px;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
		}

		.is-invalid{
			color: red;
		}
	</style>
</head>

<body>
	<div class="card w-50 mx-auto mt-5 p-3 login-form">
		<div class="text-center">
			<h1>Registration Page</h1>
		</div>
		<form action="<?php echo base_url('registration/submit'); ?>" method="post">
			<div class="mb-3">
				<label for="fullname" class="form-label">Full Name</label>
				<input type="text" class="form-control" placeholder="Enter Full Name" id="fullname" name="fullname">
				<div class="is-invalid">
					<?php echo form_error('fullname'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
				<div class="is-invalid">
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="phone_no" class="form-label">Phone No</label>
				<input type="number" class="form-control" placeholder="Enter Phone No" id="phone_no" name="phone_no">
				<div class="is-invalid">
					<?php echo form_error('phone_no'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="dob" class="form-label">Date Of Birth</label>
				<input type="date" class="form-control" id="dob" name="dob">
				<div class="is-invalid">
					<?php echo form_error('dob'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				<div class="is-invalid">
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password">
				<div class="is-invalid">
					<?php echo form_error('confirm_password'); ?>
				</div>
			</div>
			<div class="mb-3 text-center">
				<p>Already have an account? <a href="<?php echo base_url('login'); ?>">Login here</a></p>
			</div>
			<button type="submit" class="btn btn-primary w-100">Register</button>
		</form>
	</div>
	<script src="<?php echo base_url('assets/css/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
