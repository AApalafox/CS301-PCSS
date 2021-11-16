<!-- Modal -->
<div class="modal fade in" id="addScheduleModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<form action="index.php" method="POST" class="need-validation">
				<div class="modal-header">
					<!-- <h5 class="modal-title" id="exampleModalLabel">User Details</h5> -->
					<p class="modal-title brand m-0 mt-2">
						<i class="fas fa-info-circle m-1 fa-1x"></i></i>Consultation Details
					</p>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div><!-- end of modal header -->
				<div class="g-3 modal-body p-4 row container">
					<div class="col">
						<div class="container">
							<label class="form-label caption-body">Have you seen a doctor for any of the following illness?</label>
							<div class="form-check">
								<input class="form-input" type="checkbox" value="" id="highBloodPressure">
								<label class="form-label" for="highBloodPressure">
									High Blood Pressure
								</label>
							</div>
							<div class="form-check">
								<input class="form-input" type="checkbox" value="" id="heartDisease">
								<label class="form-label" for="heartDisease">
									Heart Disease
								</label>
							</div>
							<div class="form-check">
								<input class="form-input" type="checkbox" value="" id="highCholesterol">
								<label class="form-label" for="highCholesterol">
									High Cholesterol
								</label>
							</div>
							<div class="form-check">
								<input class="form-input" type="checkbox" value="" id="diabetes">
								<label class="form-label" for="diabetes">
									Diabetes
								</label>
							</div>
							<div class="form-check mb-3">
								<input class="form-input" type="checkbox" value="" id="bleedingDisorder">
								<label class="form-label" for="bleedingDisorder">
									Bleeding Disorder
								</label>
							</div>
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
						</div>
					</div>
					<div class="col">
						<div class="mb-3">
							<label class="form-label caption-body">Specific Reason for Consultation</label>
							<textarea class="form-control" id="reason" placeholder="Required reason" required></textarea>
							<div class="invalid-feedback">
								Please enter your reason for consultation
							</div>
						</div>
						<label class="form-label caption-body">Consultation Date and Time</label>
						<div class="">
							<input type="text" class="form-control isInvalid" id="datetime2" readonly required>
							<div class="invalid-feedback">
								Please enter your reason for consultation
							</div>
							<script type="text/javascript">
								$("#datetime2").datetimepicker({
									format: 'yyyy-mm-dd hh:ii',
									autoclose: true
								});
							</script>
						</div>
					</div>
				</div><!-- end of modal body -->
				<div class="modal-footer">
					<div class="text-end">
						<button type="submit" class="btn" name="submitSchedule">
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
</script>