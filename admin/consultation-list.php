<!DOCTYPE html>
<html lang="en">
<?php
include("endpoints/db.php");
$sql = "SELECT s.schedule_id as id, CONCAT(p.fname,' ',p.lname) as name, 
	p.birthdate, p.email, p.phone, f.condition, f.reason, s.schedule_dateTime, s.status
	FROM schedule as s
	JOIN form as f
	on f.form_id = s.form_id
	JOIN patient AS p
	on f.patient_id = p.patient_id";

$result1 = $conn->query($sql);
if ($result1->num_rows > 0) {
	$result1 = ($result1->fetch_all(MYSQLI_ASSOC));
}
if (isset($_COOKIE["type"]))
	if ($_COOKIE["type"] == "patient")
		header("location:logout.php");

if (!isset($_COOKIE["id"])) {
	header("location:index.php");
}

mysqli_close($conn);

$ajaxVar = ["id", "name", "schedule_dateTime", "status", "view"];
$placeholder = ["ID", "Patient", "Date", "Status", "Details"];

$query_Id = 'empty';
if (isset($_GET['q'])) {
	$query_Id = $_GET['q'];
}

?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	<title>PCSS admin</title>

	<?php include 'assets/links.php'; ?>
	<style>
		input.dateTime {
			max-width: 145px;
			display: inline;
		}

		input.status {
			max-width: 85px;
			display: inline;
		}
		input.options {
			max-width: 85px;
			max-height: 21px;
		}
		#consultationTable{
			overflow:visible;
		}
	</style>

</head>

<body>

	<div class="" id="pageConsultations">
		<?php include 'templates/side-nav.php'; ?>
	</div>
	<div class="content" id="mainContainer">
		<?php include 'templates/header.php'; ?>
		<hr>

		<!-- page content -->
		<div class="container" id="consultationTable">
			<label class="caption-body">Consultation List</label>
			<table class="table table-hover align-middle" id="myTable">
				<thead>
					<tr>
						<?php
						for ($i = 0; $i < count($placeholder); $i++)
							echo '<th>', $placeholder[$i], '</th>';
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					echo '<br>';

					foreach ($result1 as $row) {

						echo '<tr>';
						for ($i = 0; $i < count($ajaxVar); $i++) {
							if ($ajaxVar[$i] == "status") {
								echo '
							<td>
							
							<div class="navbar" style="display:inline">
								<input type="text" class="status dropdown-toggle form-control bg-light"readonly data-bs-toggle="dropdown" value="', $row[$ajaxVar[$i]], '" dummy="', $row[$ajaxVar[$i]], '">
								<ul class="dropdown-menu">
									<li>
										<a class="statusChg dropdown-item" dummy="Success">
											<input class="options form-control-plaintext" disabled placeholder="Success">
										</a>
									</li>
									<li>
										<a class="statusChg dropdown-item" dummy="Pending">
											<input class="options form-control-plaintext" disabled placeholder="Pending">
										</a>
									</li>
									<li>
										<a class="statusChg dropdown-item" dummy="Cancelled">
											<input class="options form-control-plaintext" disabled placeholder="Cancelled">
										</a>
									</li>
								</ul>
							</div>
							<button class="statusUpd btn fas fa-check-square bg-success" href="#" value="', $row[$ajaxVar[0]], '"style="display:none"></button>
							';
							} else if ($ajaxVar[$i] == "view") {
								echo '
								<td>
								<button class="chg btn fas fa-eye px-3 bg-dark" onclick="viewSchedule(this.value)" href="#" value="',
								$row["id"], '/',
								$row["name"], '/',
								$row["email"], '/',
								$row["phone"], '/',
								$row["birthdate"], '/',
								$row["condition"], '/',
								$row["reason"], '/',
								$row["schedule_dateTime"], '/',
								$row["status"], '">
								
								';
								// These are elements in ajaxVar but also not dateTime, bacase there are other items not included in ajaxVar
							} else if (in_array($ajaxVar[$i], $ajaxVar) && $ajaxVar[$i] != "schedule_dateTime") {
								echo '<td>', $row[$ajaxVar[$i]];
							} else {
								echo '
								<td>
								<input type="text" class="form-control dateTime bg-light" readonly value="', substr($row[$ajaxVar[$i]], 0, -3), '">
								<p style="display:none">', substr($row[$ajaxVar[$i]], 0, -3), '</p>
								<button class="dateUpd btn fas fa-check-square bg-success" href="#" value="', $row[$ajaxVar[0]], '"style="display:none"></button>
							';
							}
							echo '</td>';
						}
						echo '</tr>';
					}
					include 'modal-schedule-details.php';
					?>
				</tbody>
			</table>
		</div>
		<hr>
		<?php include 'templates/bottom-nav.php'; ?>
	</div>
</body>
<script>
	//date jQueries
	var dateTime, dateId;
	$(".dateTime")
		.datetimepicker({
			format: 'yyyy-mm-dd hh:ii',
			autoclose: true
		})
		.change(function() {
			$(this).parent().find('button.dateUpd').show();
			dateTime = $(this).val();
		});

	$(".dateUpd").click(function() {
		$(this).hide();
		dateId = $(this).val();

		scheduleAdjust(dateTime, dateId);
	});
	//date jQueries

	//status jQueries
	var schedStat, schedId;
	$("a.statusChg").click(function() {
		current = $(this).parent().parent().parent();
		//goes to the <input>, top of it that <a> selected

		if (current.find('input').attr("dummy") == $(this).attr("dummy")) {
			current.parent().find('button.statusUpd').hide();
		} else {
			schedStat = $(this).attr("dummy");
			current.parent().find('button.statusUpd').show();
			//goes to the <td> of that row, and activates the confirm button
		}
		current.find('input.status').attr("value", $(this).attr("dummy"));
	});
	$("button.statusUpd").click(function() {
		schedId = $(this).val();
		scheduleUpdateStatus(schedStat, schedId);
	});
	//status jQueries

	//display Table
	$(document).ready(function() {
		$('#myTable').dataTable();
	});
	
	query_Id = '<?php echo $query_Id ?>';
	if (query_Id != 'empty') {
		$('#myTable').dataTable({
			"search": {
				"search": query_Id
			}
		});
	}

	function scheduleAdjust(dT, dI) {
		$.ajax({
			'url': "endpoints/schedule/scheduleAdjust.php",
			'type': "POST",
			'data': {
				"schedule_id": dI,
				"schedule_dateTime": (dT + ":00"),
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

	function scheduleUpdateStatus(status, id) {
		$.ajax({
			'url': "endpoints/schedule/scheduleUpdateStatus.php",
			'type': "POST",
			'data': {
				"schedule_id": id,
				"status": status,
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

	function viewSchedule(details) {
		console.log(details);
		details = details.split('/');
		//schedule id, name, birthdate, email, phone, condition, reason, date, status
		tagId = ['scheduleId', 'patientName', 'birthdate', 'email', 'phone', 'condition', 'reason', 'date', 'status', ]
		console.log(details);
		for (var i = 0; i < details.length; i++) {
			$("#" + tagId[i]).html(details[i]);
		}
		$('#modalScheduleDetails').modal('show');
	}
</script>

</html>
