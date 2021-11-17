<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	<title>PCSS admin</title>

	<?php include 'assets/links.php'; ?>

</head>

<body>
	<div class="main-container" id="mainContainer">
		<?php include 'templates/header.php'; ?>
		<hr>

		<!-- side nav -->
		<div class="container">
			<?php include 'templates/side-nav.php'; ?>
		</div>

		<!-- page content -->
		<div class="container">
			<label class="caption-body">Consultation List</label>
			<table class="table table-hover align-middle">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">
							Schedule
							<button type="button" class="btn">
								<i class="fas fa-arrow-up"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-arrow-down"></i>
							</button>
						</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark Otto</td>
						<td>Feb 01,2022 02:02 PM</td>
						<td>Pending</td>
						<td>
							<button type="button" class="btn">
								<i class="fas fa-eye"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-edit"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-trash-alt"></i>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row">1</th>
						<td>Mark Otto</td>
						<td>Feb 01,2022 02:02 PM</td>
						<td>Pending</td>
						<td>
							<button type="button" class="btn">
								<i class="fas fa-eye"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-edit"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-trash-alt"></i>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row">1</th>
						<td>Mark Otto</td>
						<td>Feb 01,2022 02:02 PM</td>
						<td>Pending</td>
						<td>
							<button type="button" class="btn">
								<i class="fas fa-eye"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-edit"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-trash-alt"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>