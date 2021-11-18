<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

	<?php
	//db
	include("../endpoints/db.php");
	//include the endpoint to use
	include '../endpoints/consultant/consultantDisplay.php';

	echo
	'<table class="table table-hover  align-middle">
				<thead>
					<tr>
						<th scope="col">
							ID
							<button type="button" class="btn">
								<i class="fas fa-arrow-up"></i>
							</button>
							<button type="button" class="btn">
								<i class="fas fa-arrow-down"></i>
							</button>
						</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">
							Action
						</th>
					</tr>
				</thead>
				<tbody>';

	// print loop data in php/server as td
	foreach ($consultants as $consultant) {
		echo '		<tr>';
		echo '			<th>'	. $consultant['consultant_id'] . '</th>';
		echo '					<td>'	. $consultant['fname'] . ' ' . $consultant['lname'] . '</td>';
		echo '					<td>' . $consultant['email'] . '</td>';
		echo '					<td>';
		echo '					<button type="button" class="btn">';
		echo '						<i class="fas fa-eye"></i>';
		echo '					</button>';
		echo '					<button type="button" class="btn">';
		echo '						<i class="fas fa-edit"></i>';
		echo '					</button>';
		echo '					<button type="button" class="btn">';
		echo '						<i class="fas fa-trash-alt"></i>';
		echo '					</button>';
		echo '				</td>';
		echo '			</tr>';
		echo "<tr>";
	}

	echo '</tbody>
	</table>'; //endtag of table

	?>

</body>

</html>