<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Page</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
	<style>
		tbody {
			text-align: center !important;
			vertical-align: middle !important;
		}

		a {
			text-decoration: none !important;
		}

		.profile-card {
			background: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 300px;
			text-align: center;
		}

		.profile-card img {
			width: 100px;
			height: 100px;
			border-radius: 50%;
			object-fit: cover;
		}

		.profile-card h2 {
			margin: 10px 0;
		}

		.profile-card p {
			margin: 5px 0;
			color: #555;
		}

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

<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">Home</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="<?php echo base_url('profile'); ?>">Profile</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('login/logout'); ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<body>
