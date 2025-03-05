<div class="card w-50 mx-auto mt-5 mb-5 p-3 login-form">
	<div class="text-center">
		<h1>Profile Update</h1>
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
	<form action="<?php echo base_url('profile/update/' . htmlspecialchars($user->id)); ?>" method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="fullname" class="form-label">Full Name</label>
			<input type="text" class="form-control" placeholder="Enter Full Name" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user->fullname) ?>">
			<div class="is-invalid">
				<?php echo form_error('fullname'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email</label>
			<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>">
			<div class="is-invalid">
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="phone_no" class="form-label">Phone No</label>
			<input type="number" class="form-control" placeholder="Enter Phone No" id="phone_no" name="phone_no" value="<?php echo htmlspecialchars($user->phone_no); ?>">
			<div class="is-invalid">
				<?php echo form_error('phone_no'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="profile_image" class="form-label">Profile Image</label>
			<input type="file" class="form-control" placeholder="Enter Phone No" id="profile_image" name="profile_image">
			<div>
				<img src="<?php echo base_url('uploads/profile/' . $user->profile_image); ?>" alt="profile image" class="img-thumbnail" width="100">
			</div>
			<div class="is-invalid">
				<?php echo form_error('profile_image'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="dob" class="form-label">Date Of Birth</label>
			<input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($user->dob); ?>">
			<div class="is-invalid">
				<?php echo form_error('dob'); ?>
			</div>
		</div>
		<button type="submit" class="btn btn-primary w-100">Update Profile</button>
	</form>
</div>
