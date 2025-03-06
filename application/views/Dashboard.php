<div class="w-75 card p-3 mt-5 mb-5 m-auto">
	<h4>Welcome <?php echo $this->session->userdata('user')->fullname; ?></h4>

	<table id="userTable" class="table table-bordered table-striped text-center">
		<thead>
			<tr>
				<th class="text-center">Id</th>
				<th class="text-center">Full Name</th>
				<th class="text-center">Email</th>
				<th class="text-center">Phone No</th>
				<th class="text-center">Profile Image</th>
				<th class="text-center">Date Of Birth</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
	$(document).ready(function() {
		var table = $('#userTable').DataTable({
			"processing": true,
			"ajax": {
				"url": "<?php echo base_url('dashboard/get'); ?>",
				"type": "GET",
			},
			"columns": [{
					"data": "id"
				},
				{
					"data": "fullname"
				},
				{
					"data": "email"
				},
				{
					"data": "phone_no"
				},
				{
					"data": "profile_image",
					"render": function(data, type, row) {
						return '<img src="' + '<?php echo base_url('uploads/profile/'); ?>' + data + '" alt="Profile Image" class="rounded-pill" width="100" height="100">';
					}
				},
				{
					"data": "dob"
				}
			]
		});

		$('#searchInput').on('keydown', function(event) {
			if (event.key === 'Enter') {
				event.preventDefault();
				table.ajax.reload();
			}
		});

	});
</script>
