<!-- Modal -->
<div class="modal fade in" id="modalScheduleDetails" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="modal-title" id="exampleModalLabel">User Details</h5> -->
				<h5 class="modal-title title mini-title m-0 mt-2">
					<i class="fas fa-info-circle m-1 text-dark fa-2x"></i></i>
					<div class="d-inline">
						<h4 class="d-inline fw-bold">Schedule ID: </h4>
						<h4 id="scheduleId" class="d-inline fw-bold"></label>
					</div>
				</h5>
				<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
			</div>
			<div class="modal-body p-4">

				<div class="row mb-3">
					<div class="col">
						<label class="form-label fw-bold">Patient Name: </label>
						<p id="patientName"></p>
					</div>
					<div class="col">
						<label class="form-label fw-bold">Birthdate</label>
						<p id="birthdate"></p>
					</div>
				</div>
				<div class="mb-3 row">
					<div class="col">
						<label class="form-label fw-bold">Email</label>
						<p id="email"></p>
					</div>
					<div class="col">
						<label class="form-label fw-bold">Phone</label>
						<p id="phone"></p>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label fw-bold">Condidition</label>
					<p id="condition"></p>
				</div>
				<div class="mb-3">
					<label class="form-label fw-bold">Reason</label>
					<p id="reason"></p>
				</div>
				<div class="mb-3 row">
					<div class="col">
						<label class="form-label fw-bold">Scheduled Consultation</label>
						<p id="date"></p>
					</div>
					<div class="col">
						<label class="form-label fw-bold">Status</label>
						<p id="status"></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="text-end">
					<button type="button" class="btn btnSquare" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->