<?php
$conditions = ["High Blood Pressure", "Heart Disease", "High Cholesterol", "Diabetes", "Bleeding Disorder"];
$ajaxVar = ["condition", "reason", "form_dateTime", "patient_id"];
?>
<!-- Modal -->
<div class="modal fade in" id="addScheduleModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<form id="formRequest" method="POST">
				<div class="modal-header">
					<!-- <h5 class="modal-title" id="exampleModalLabel">User Details</h5> -->
					<p class="modal-title brand m-0 mt-2">
						<i class="fas fa-info-circle m-1 fa-1x text-dark"></i></i>Consultation Details
					</p>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div><!-- end of modal header -->
				<div class="container">
					<div class="g-3 modal-body p-4 row  overflow-auto">
						<div class="col">
							<div class="container">
								<label class="form-label caption-body">Have you seen a doctor for any of the following illness?</label>

								<?php
								//php foreach loop
								//to print all of the checkboxes
								foreach ($conditions as $name) {
								?>
									<div class="form-check">
										<input class="form-input" type="checkbox" value="<?= $name ?>" id="<?= $name ?>">
										<label class="form-label" for="<?= $name ?>"><?= $name ?></label>
									</div>
								<?php
								}
								?>

								<!-- maybe delete this 
							<label class="form-label caption-body">Have you ever undergone surgery?</label>
							<div class="form-check">
								<input type="radio" class="form-check-input" id="surgery-yes" name="surgery-radio" required>
								<label class="form-check-label" for="surgery-yes">Yes</label>
							</div>
							<div class="form-check mb-3">
								<input type="radio" class="form-check-input" id="surgery-no" name="surgery-radio" required>
								<label class="form-check-label" for="surgery-no">No</label>
								<div class="invalid-feedback">Please select either Yes or No</div>
							</div>
							maybe delete this -->

							</div>
						</div>
						<div class="col">
							<div class="mb-3">
								<label class="form-label caption-body">Specific Reason for Consultation</label>
								<textarea class="form-control" id="formReason" placeholder="Required reason" required></textarea>
							</div>
							<label class="form-label caption-body">Consultation Date and Time</label>
							<div class="">
								<input type="text" class="form-control isInvalid" id="formDateTime" readonly required>
							</div>
						</div>
					</div><!-- end of modal body -->
				</div>
				<div class="modal-footer">
					<div class="text-end">
						<button type="submit" class="btn" name="formSubmit" id="formSubmit">
							<!-- <i class="fas fa-user-plus m-1 text-light"></i> -->
							Submit Consultation
						</button>
					</div>
				</div><!-- end of modal footer -->
			</form>
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->

<script>
	/*
	imma delete this function on next update because this is for form with attribute "novalidate",
	its irrelevant here since we dont use that
	(function() {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}
					form.classList.add('was-validated')
				}, false)
			})
	})()
	*/
	$("#formDateTime").datetimepicker({
		format: 'yyyy-mm-dd hh:ii',
		autoclose: true
	});

	//TO CHECK IF A CHECKBOX IS ACTIVE
	var conditions = [];
	<?php for ($i = 0; $i < count($conditions); $i++) { ?>
		$('.form-check:eq(<?= $i ?>)').find('input').click(function() {
			if ($(this).is(':checked')) {
				conditions.push($(this).val());
			} else {
				conditions.splice(conditions.indexOf($(this).val()), 1);
			}
		});
	<?php }; ?>

	//onsubmit function
	$('#formRequest').bind('submit', function() {
		record = [""];
		if (conditions.length > 0) {
			for (let x in conditions) {
				record[0] += conditions[x] + ", ";
			}
			record[0] = record[0].substring(0, record[0].length - 2);
		} //condition
		record.push($('.form-control:eq(0)').val()); //reason
		record.push($('.form-control:eq(1)').val() + ":00"); //dateTime
		record.push(Cookies.get('id')); //patient_id
		insertForm(record);
		return false;
	});

	//INSERT
	function insertForm(record) {
		$.ajax({
			'url': "config/endpoints/formSubmit.php",
			'type': "POST",
			'data': {
				<?php
				for ($i = 0; $i < count($ajaxVar); $i++)
					echo '', $ajaxVar[$i], ':record[', $i, '],';
				?>
			},
			success: function(response) {
				response = JSON.parse(response);
				if (response.code == 200) {
					console.log(response.code);
					alert("Successfully submitted a schedule.");
					window.location.reload();
				} else if (response.code == 400) {
					console.log(response.error);

				} else {
					console.log(response.code);
				}
			}
		});
	}
</script>