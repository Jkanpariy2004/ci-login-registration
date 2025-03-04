<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
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

		.is-invalid {
			color: red;
		}
	</style>
</head>

<body>
	<div class="card w-50 mx-auto mt-5 p-3 login-form">
		<div class="text-center">
			<h1>Login Page</h1>
		</div>
		<?php if ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>
		<form action="<?php echo base_url('login/submit'); ?>" method="post">
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" name="email" class="form-control" placeholder="Enter email" autofocus>
				<div class="is-invalid">
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
				<div class="is-invalid">
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="mb-3 text-center">
				<p>Don't have an account? <a href="<?php echo base_url('registration'); ?>">Register here</a></p>
			</div>
			<button type="submit" class="btn btn-primary w-100">Login</button>
		</form>

	</div>
	<script src="<?php echo base_url('assets/css/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
