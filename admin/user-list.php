<!DOCTYPE html>
<html lang="en">

<?php
include("endpoints/db.php");
$sql = "SELECT * FROM consultant";
$result = $conn->query($sql);

$ajaxVar = ["consultant_id", "fname", "lname", "email", "password", "job"];
$placeholder = ["ID", "First Name", "Last Name", "email", "password", "job"];
?>

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
			<label class="caption-body">User List</label>

			<!-- myTable -->
			<table class="table table-hover align-middle" id="myTable">
				<thead>
					<tr>
						<th scope="col" class="">ID</th>
						<?php
						for ($i = 1; $i < count($placeholder); $i++)
							echo '<th class="">', $placeholder[$i], '</th>';
						echo '<td class="">Edit/Delete</td>';
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = $result->fetch_assoc()) {
						echo '<tr>';
						for ($i = 0; $i < count($ajaxVar); $i++)
							echo '<td>', $row[$ajaxVar[$i]], '</td>';
						echo '
						<td>
						<button class="chg btn fas fa-edit px-3 bg-dark" href="#" value="', $row[$ajaxVar[0]], '"></button>
							<button class="del btn fas fa-trash-alt bg-danger" href="#" value="', $row[$ajaxVar[0]], '"></button>
							<button class="upd btn fas fa-check-square" href="#" value="', $row[$ajaxVar[0]], '"style="display:none"></button>
						</td>
						';
						echo '</tr>';
					}
					?>
				</tbody>
			</table><!-- end of myTable-->
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>

</html>

<script>
	$(document).ready(function() {
		$('#myTable').dataTable();
	});

	//delete function per Table Row
	$('.del').click(function() {
		$(this).parent().parent().hide();
		deleteRecord($(this).attr("value"));
	});
	//change function per Table Row
	$('.chg').click(function() {
		<?php
		for ($i = 1; $i < count($ajaxVar); $i++)
			echo '$(this).parent().parent().find(\'td:eq(', $i, ')\').html("<input>");';
		?>
		$(this).hide();
		$(this).parent().find('a:eq(0)').hide();
		$(this).parent().find('a:eq(2)').show();
	});

	//update function per Table Row
	$('.upd').click(function() {
		updateRecord($(this).parent().parent());
	});
	//UPDATE
	function updateRecord(e) {
		$.ajax({
			'url': "endpoints/consultant/consultantUpdate.php",
			'type': "POST",
			'data': {
				<?= $ajaxVar[0] ?>: $(e).find('td:eq(0)').text(),
				<?php
				for ($i = 1; $i < count($ajaxVar); $i++)
					echo $ajaxVar[$i], ': $(e).find(\'td:eq(', $i, ')\').find(\'input\').val(),';
				?>
			},
			success: function(response) {
				response = JSON.parse(response);
				if (response.code == 200) {

					window.location.reload()
				} else if (response.code == 400) {
					console.log(response.error);

				} else {
					console.log(response.code);
				}
			}
		});
	}
	//DELETE
	function deleteRecord(record) {
		$.ajax({
			'url': "endpoints/consultant/consultantDelete.php",
			'type': "POST",
			'data': {
				<?= $ajaxVar[0] ?>: record,
			},
			success: function(response) {
				response = JSON.parse(response);
				if (response.code == 200) {
					console.log(response.code);
				} else if (response.code == 400) {
					console.log(response.error);

				} else {
					console.log(response.code);
				}
			}
		});
	}
</script>