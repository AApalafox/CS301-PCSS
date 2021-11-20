<!-- Modal -->
<div class="modal fade in" id="modalAddUser">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title title mini-title m-0 mt-2">
					<i class="fas fa-user m-1 text-dark fa-2x"></i></i>
					<div class="d-inline">
						<h4 class="d-inline fw-bold">User Details</h4>
					</div>
				</h5>
			</div>
			<form class="row g-3" id="addUserForm">

				<div class="modal-body p-4">
					<div class="fluid-container">
						<div class="row">
							<div class="col">
								<label class="form-label">First name</label>
								<input type="text" class="form-control" placeholder="First Name" id="addUserFname" value="" required>
								
							</div>
							<div class="col">
								<label class="form-label">Last name</label>
								<input type="text" class="form-control" placeholder="Last Name" id="addUserLname" value="" required>
								
							</div>
						</div>
						<div class="col">
							<label class="form-label">Email</label>
							<input type="email" class="form-control" placeholder="example@gmail.com" id="addUserEmail" value="" required>
						</div>
						<div class="col">
							<label class="form-label">Password</label>
							<input type="password" class="form-control" placeholder="Password" id="addUserPassword" value="" required>
						</div>
						<div class="">
							<label class="form-label">Job</label>
							<select class="form-select" id="addUserJob" required>
								<option selected disabled value="">Choose...</option>
								<option>Surgeon</option>
								<option>Therapist</option>
								<option>Doctor</option>
							</select>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<div class="text-end">
						<button class="btn btnSquare" type="submit" value="addUserSubmit">Submit form</button>
					</div>
			</form>

		</div>
	</div><!-- end of modal content -->
	<script>

	//onsubmit function
	$('#addUserForm').bind('submit',function(){
		record = [];
		record.push($("#addUserFname").val());
		record.push($("#addUserLname").val());
		record.push($("#addUserEmail").val());
		record.push($("#addUserPassword").val());
		record.push($("#addUserJob").val());
		
		consultantCreate(record);
		return false;
	});
	
	//INSERT
	function consultantCreate(record){
		$.ajax({
			'url':"endpoints/consultant/consultantCreate.php",
			'type':"POST",
			'data':{
				fname:record[0],
				lname:record[1],
				email:record[2],
				password:record[3],
				job:record[4]
			},
			success: function(response){
				response = JSON.parse(response);
				if(response.code == 200){
					console.log(response.code);
					alert("Successfully added a user!.");
					window.location.reload();
				}
				else if (response.code == 400){
					alert("no");
					console.log(response.error);

				}
				else{
					console.log(response.code);
				}
			}
		});
	}
	</script>
</div><!-- end of modal container -->
