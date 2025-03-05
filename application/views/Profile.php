<div class="card shadow-lg rounded-4 p-4 mt-5 mb-5 mx-auto text-center" style="max-width: 400px;">
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
	<?php if (isset($user) && is_object($user)): ?>
		<div class="card-body">
			<img src="<?php echo base_url('uploads/profile/' . htmlspecialchars($user->profile_image)); ?>"
				alt="Profile Image"
				class="rounded-circle border border-3 border-primary mb-3"
				width="100" height="100">

			<h5 class="card-title fw-bold"><?php echo htmlspecialchars($user->fullname); ?></h5>

			<ul class="list-group list-group-flush">
				<li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user->email); ?></li>
				<li class="list-group-item"><strong>Phone:</strong> <?php echo htmlspecialchars($user->phone_no); ?></li>
				<li class="list-group-item"><strong>DOB:</strong> <?php echo date("d-m-Y", strtotime($user->dob)); ?></li>
			</ul>

			<a class="btn btn-primary mt-3" href="<?php echo base_url('profile/edit/' . htmlspecialchars($user->id)); ?>">Edit Profile</a>
			<a class="btn btn-danger mt-3" onclick="return confirm('Are You Sure delete this profile?')" href="<?php echo base_url('profile/delete/' . htmlspecialchars($user->id)); ?>">Delete Profile</a>
		</div>
	<?php else: ?>
		<div class="alert alert-danger text-center">User data not available.</div>
	<?php endif; ?>
</div>
