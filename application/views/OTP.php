<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
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
			<h1>OTP</h1>
		</div>
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('warning')): ?>
			<div class="alert alert-warning">
				<?php echo $this->session->flashdata('warning'); ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>


		<form action="<?php echo base_url('forgotpassword/otpsubmit'); ?>" method="post">
			<div class="mb-3">
				<label for="otp" class="form-label">Otp</label>
				<input type="text" name="otp" class="form-control" placeholder="Enter otp" autofocus value="<?php echo set_value('otp'); ?>">
				<div class="is-invalid">
					<?php echo form_error('otp'); ?>
				</div>
			</div>
			<button type="submit" class="btn btn-primary w-100">Submit</button>
		</form>

	</div>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>
