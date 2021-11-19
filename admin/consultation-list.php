<!DOCTYPE html>
<html lang="en">
<?php 
	include("endpoints/db.php");
	$sql = "SELECT * FROM schedule";
	$result1 = $conn->query($sql);
	if ($result1->num_rows > 0) {
		$result1 = ($result1->fetch_all(MYSQLI_ASSOC));
	}
	if (!isset($_COOKIE["id"])) {
		header("location:index.php");
	}
	

	$ajaxVar = ["schedule_id", "schedule_dateTime", "status", "form_id"];
	$placeholder = ["ID", "Date", "Time", "Status", "Form ID", "Name"];
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="maximum-scale=1.0, width=device-width, initial-scale=1.0">
	<title>PCSS admin</title>

	<?php include 'assets/links.php'; ?>
	<style>
		input#dateTime{
			min-width:138px; display:inline;
		}
		input#status{
			min-width:90px; display:inline;
		}
	</style>

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
			<table class="table table-hover align-middle" id="myTable">
				<thead>
					<tr>
						<?php 
							for($i = 0; $i <count($ajaxVar); $i++)
								echo '<th>',$ajaxVar[$i],'</th>';
						?>
					</tr>
				</thead>
				<tbody>
				<?php


				foreach($result1 as $row){
					echo '<tr>';
					for ($i = 0; $i < count($ajaxVar); $i++){
						if($ajaxVar[$i]=="status"){
							echo '
							<td>
							<input type="text" class="form-control" readonly id="status" value="',$row[$ajaxVar[$i]],'">
							<p style="display:none">',$row[$ajaxVar[$i]],'</p>
							<button id="statusUpd" class="btn fas fa-check-square bg-success" href="#" value="', $row[$ajaxVar[0]], '"style="display:none"></button>
							';
						}
						else if($ajaxVar[$i]!="schedule_dateTime"){
							echo '<td>', $row[$ajaxVar[$i]];
						}
						else{
							echo '
								<td>
								<input type="text" class="form-control" readonly id="dateTime" value="',substr($row[$ajaxVar[$i]], 0, -3),'">
								<p style="display:none">',substr($row[$ajaxVar[$i]], 0, -3),'</p>
								<button id="dateUpd" class="btn fas fa-check-square bg-success" href="#" value="', $row[$ajaxVar[0]], '"style="display:none"></button>
							';
						}
						echo '</td>';
					}
					echo '</tr>';
				}

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
	$("#dateTime")
		.datetimepicker({
			format: 'yyyy-mm-dd hh:ii',
			autoclose: true
		})
		.change(function (){
			$("#dateUpd").show();
			dateTime = $(this).val();
		})
	;

	$("#dateUpd").click(function(){
		$("#dateUpd").hide();
		dateId = $(this).val();
		scheduleAdjust(dateTime, dateId);
	});
	//date jQueries

	//status jQueries
	var schedStat, schedId;
	$("#status")
		.focus(function(){
			$(this).attr("readonly", false); 
		})
		.focusout(function(){
			$(this).attr("readonly", true); 
		})
		.change(function(){
			schedStat = ($(this).val()).toLowerCase();
			$("#statusUpd").show();
		})
		.on('keypress',function(e) {
			if(e.which == 13) {
				$(this).attr("readonly", true); 
			}
		})
	;
	$("#statusUpd").click(function(){
		schedId = $(this).val();
		scheduleUpdateStatus(schedStat, schedId);
	});
	//status jQueries

	//display Table
	$(document).ready(function () {
	    $('#myTable').dataTable();
	});

	function scheduleAdjust(dT, dI){
		$.ajax({
			'url': "endpoints/schedule/scheduleAdjust.php",
			'type': "POST",
			'data': {
				<?= $ajaxVar[0] ?>: dI,
				<?= $ajaxVar[1] ?>: (dT+":00"),
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
	function scheduleUpdateStatus(status, id){
		$.ajax({
			'url': "endpoints/schedule/scheduleUpdateStatus.php",
			'type': "POST",
			'data': {
				<?= $ajaxVar[0] ?>: id,
				<?= $ajaxVar[2] ?>: status,
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
</script>
</html>
