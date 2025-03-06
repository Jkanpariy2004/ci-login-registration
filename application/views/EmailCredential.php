<div class="card p-3 m-5">
	<div class="text-center">
		<h3>Mail Credential</h3>
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

	<form action="<?php echo base_url('email/submit') ?>" method="POST">
		<div class="mb-3">
			<label for="smtp_host">SMTP Mail Host</label>
			<input type="text" class="form-control" name="smtp_host" id="smtp_host"
				value="<?php echo isset($email_config['smtp_host']) ? $email_config['smtp_host'] : ''; ?>"
				placeholder="Enter SMTP Mail Host">
			<div class="is-invalid">
				<?php echo form_error('smtp_host'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="smtp_user">SMTP Mail UserName</label>
			<input type="text" class="form-control" name="smtp_user" id="smtp_user"
				value="<?php echo isset($email_config['smtp_user']) ? $email_config['smtp_user'] : ''; ?>"
				placeholder="Enter SMTP Mail UserName">
			<div class="is-invalid">
				<?php echo form_error('smtp_user'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="smtp_pass">SMTP Mail Password</label>
			<input type="text" class="form-control" name="smtp_pass" id="smtp_pass"
				value="<?php echo isset($email_config['smtp_pass']) ? $email_config['smtp_pass'] : ''; ?>"
				placeholder="Enter SMTP Mail Password">
			<div class="is-invalid">
				<?php echo form_error('smtp_pass'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="smtp_port">SMTP Mail Port</label>
			<input type="text" class="form-control" name="smtp_port" id="smtp_port"
				value="<?php echo isset($email_config['smtp_port']) ? $email_config['smtp_port'] : ''; ?>"
				placeholder="Enter SMTP Mail Port">
			<div class="is-invalid">
				<?php echo form_error('smtp_port'); ?>
			</div>
		</div>
		<div class="mb-3">
			<label for="smtp_crypto">SMTP Mail Crypto</label>
			<input type="text" class="form-control" name="smtp_crypto" id="smtp_crypto"
				value="<?php echo isset($email_config['smtp_crypto']) ? $email_config['smtp_crypto'] : ''; ?>"
				placeholder="Enter SMTP Mail Crypto">
			<div class="is-invalid">
				<?php echo form_error('smtp_crypto'); ?>
			</div>
		</div>
		<div class="mb-3">
			<button class="btn btn-primary w-100" type="submit">Submit</button>
		</div>
	</form>
</div>
