<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Page</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('dashboard/logout'); ?>">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="w-75 card p-3 mt-5 m-auto">
		<h4>Welcome <?php echo $this->session->userdata('user')->fullname; ?></h4>

		<div class="mb-3">
			<label for="searchInput" class="form-label">Search</label>
			<input type="text" id="searchInput" class="form-control" placeholder="Enter full name, email, or date of birth">
		</div>

		<table id="userTable" class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th>Id</th>
					<th>Full Name</th>
					<th>Email</th>
					<th>Phone No</th>
					<th>Date Of Birth</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
	<script>
		$(document).ready(function() {
			var table = $('#userTable').DataTable({
				"processing": true,
				"ajax": {
					"url": "<?php echo base_url('dashboard/search_users'); ?>",
					"type": "GET",
					"data": function(d) {
						d.search = $('#searchInput').val();
					}
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
						"data": "dob"
					}
				]
			});

			$('#searchInput').on('keyup change', function() {
				table.ajax.reload();
			});
		});
	</script>
</body>

</html>
