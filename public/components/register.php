<!DOCTYPE html>
<html lang="en">
<?php
	$ajaxVar = ["fname","lname","birthdate","email", "password", "phone"];
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PCSS Register</title>
	<?php include '../assets/links.php' ?>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
</head>

<body>
	<div class="modal fade" id="modalPatientRegister" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form id="patientRegister" method="POST">
					<div class="modal-header justify-content-center">
						<h1 class="caption-body fw-bold mt-3">Register</h1>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col">
									<label class="form-label">First name</label>
									<input type="text" class="form-control" placeholder="First Name" id="<?=$ajaxVar[0]?>" name="<?=$ajaxVar[0]?>" value="" required>
								</div>
								<div class="col">
									<label class="form-label">Last name</label>
									<input type="text" class="form-control" placeholder="Last Name" id="<?=$ajaxVar[1]?>" name="<?=$ajaxVar[1]?>" value="" required>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label class="form-label">Birthday</label>
									<input type="text" class="form-control" placeholder="Birthday" id="<?=$ajaxVar[2]?>" name="<?=$ajaxVar[2]?>" value="" required readonly>
								</div>
								<div class="col">
									<label class="form-label">Phone</label>
									<input type="text" class="form-control" placeholder="Phone #" id="<?=$ajaxVar[5]?>" name="<?=$ajaxVar[5]?>" value="" required>
								</div>
							</div>
							<label for="email" class="form-label">Email address</label>
							<div class="input-group flex-nowrap mb-1">
								<input type="email" class="form-control" placeholder="Email" id="<?=$ajaxVar[3]?>" name="<?=$ajaxVar[3]?>" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="email"><i class="fas fa-user p-2"></i></label>
							</div>
							<label for="password" class="form-label">Password</label>
							<div class="input-group flex-nowrap mb-1">
								<input type="password" class="form-control" placeholder="Password" id="<?=$ajaxVar[4]?>" name="<?=$ajaxVar[4]?>" value="" required>
								<label class="input-group-text" id="addon-wrapping" for="password"><i class="fas fa-lock  p-2"></i></label>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between mx-3 my-2">
						<a href="../index.php" class="text-decoration-underline fst-italic">Login to my account</a>
						<button type="submit" class="btn btnSquare" name="login">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>

</html>
<script>
	$(document).ready(function() {
		$("#modalPatientRegister").modal('show');
	});
	//birthday datetimepicker
	$("#<?=$ajaxVar[2]?>").datetimepicker({
		format: 'yyyy-mm-dd',
		minView:2,
		autoclose: true
	});
	//onsubmit function
	$('#patientRegister').bind('submit',function(){
		record = [];
		<?php foreach ($ajaxVar as $row): ?>
			record.push($("#<?=$row?>").val());
		<?php endforeach ?>
		//console.log(record);
		insertPatient(record);
		return false;
	});
	
	//INSERT
	function insertPatient(record){
		$.ajax({
			'url':"../config/endpoints/patientRegister.php",
			'type':"POST",
			'data':{
				<?php 
					for($i = 0; $i <count($ajaxVar); $i++)
						echo '',$ajaxVar[$i],':record[',$i,'],';
				?>
			},
			success: function(response){
				response = JSON.parse(response);
				if(response.code == 200){
					console.log(response.code);
					alert("Successfully created account!");
					window.location.replace("../index.php");
				}
				else if (response.code == 400){
					console.log(response.error);

				}
				else{
					console.log(response.code);
				}
			}
		});
	}
</script>
