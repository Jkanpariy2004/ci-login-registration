<div class="card p-3 m-5">
	<div class="d-flex justify-content-between">
		<h3 class="mb-0">Email Templete</h3>
		<a href="<?php echo base_url('mailtemplete/add') ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</a>
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

	<table id="mailTable" class="table table-bordered table-striped text-center">
		<thead>
			<tr>
				<th class="text-center">Id</th>
				<th class="text-center">Mail Key</th>
				<th class="text-center">Mail Title</th>
				<th class="text-center">Mail Subject</th>
				<th class="text-center">Content</th>
				<th class="text-center">Edit</th>
				<th class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
	$(document).ready(function() {
		var table = $('#mailTable').DataTable({
			"processing": true,
			"ajax": {
				"url": "<?php echo base_url('mailtemplete/get'); ?>",
				"type": "GET",
			},
			"columns": [{
					"data": "id"
				},
				{
					"data": "key"
				},
				{
					"data": "title"
				},
				{
					"data": "subject"
				},
				{
					"data": "content"
				},
				{
					data: null,
					render: function(data, type, row) {
						return `
							<div>
								<a href="<?php echo base_url('mailtemplete/edit/'); ?>${row.id}" class="btn-sm btn-icon item-edit">
									<i class="fa-solid fa-pencil text-primary fs-5"></i>
								</a>
							</div>
						`;
					}
				},
				{
					data: null,
					render: function(data, type, row) {
						return `
							<div>
								<a href="<?php echo base_url('mailtemplete/delete/'); ?>${row.id}" onclick="return confirm('Are You Sure delete This Templete?')" class="btn-sm btn-icon item-edit">
									<i class="fa-solid fa-trash-can text-danger fs-5"></i>
								</a>
							</div>
						`;
					}
				}
			]
		});
	});
</script>
