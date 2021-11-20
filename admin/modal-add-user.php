<!-- Modal -->
<div class="modal fade in" id="modalAddUser" tabindex="-1" aria-labelledby="modalAddUser" aria-hidden="true">
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
			<form class="row g-3 needs-validation" novalidate>

				<div class="modal-body p-4">
					<div class="fluid-container">
						<div class="row">
							<div class="col">
								<label for="validationCustom01" class="form-label">First name</label>
								<input type="text" class="form-control" id="validationCustom01" value="Mark" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col">
								<label for="validationCustom02" class="form-label">Last name</label>
								<input type="text" class="form-control" id="validationCustom02" value="Otto" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
						</div>
						<div class="col">
							<label for="validationCustomUsername" class="form-label">Email</label>
							<div class="input-group has-validation">
								<span class="input-group-text" id="inputGroupPrepend">@</span>
								<input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">
									Please choose a username.
								</div>
							</div>
						</div>
						<div class="col">
							<label for="validationCustom03" class="form-label">Password</label>
							<input type="text" class="form-control" id="validationCustom03" required>
							<div class="invalid-feedback">
								Please provide a valid city.
							</div>
						</div>
						<div class="">
							<label for="validationCustom04" class="form-label">Job</label>
							<select class="form-select" id="validationCustom04" required>
								<option selected disabled value="">Choose...</option>
								<option>Surgeon</option>
								<option>Therapist</option>
								<option>Doctor</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid state.
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<div class="text-end">
						<button class="btn btnSquare" type="submit">Submit form</button>
					</div>
			</form>

		</div>
	</div><!-- end of modal content -->
</div><!-- end of modal container -->