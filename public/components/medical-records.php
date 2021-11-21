<?php
include("config/endpoints/db.php");

if(isset($_SERVER['HTTP_COOKIE'])){
	//for reading the cookies
	parse_str(strtr($_SERVER['HTTP_COOKIE'], array('&' => '%26', '+' => '%2B', ';' => '&')), $cookies);
	$sql = "
		SELECT 
			form_id AS id, 
			DATE_FORMAT(form_dateTime, '%M. %d, %Y - %h:%i %p') AS 'date',
			form_dateTime, 
			status,
			`condition`,
			reason
		FROM form
		WHERE patient_id LIKE ". $cookies['id'] .";
	";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$result = ($result->fetch_all(MYSQLI_ASSOC));
	}
	mysqli_close($conn);
}
$ajaxVar = ["id", "date", "status", "view"];
$placeholder = ["ID", "Date", "Status", "View"];


?>
<!-- Modal -->
<div class="modal" id="modalPublicRecords">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title title mini-title m-0 mt-2">
					<div class="d-inline">
						<h4 class="d-inline fw-bold">Form History </h4>
						<h4 id="scheduleId" class="d-inline fw-bold"></label>
					</div>
				</h5>
				<a class="fas fa-times-circle fa-2x" data-bs-dismiss="modal" href="#"></a>
			</div>
			<div class="modal-body px-3 py-2">
				<!-- page content -->
				<div class="container" id="consultationTable">
					<label class="caption-body text-secondary">Name: <?=$cookies['name'];?></label>
					<table class="table table-hover align-middle">
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

							foreach ($result as $row) {

								echo '<tr>';
								for ($i = 0; $i < count($ajaxVar); $i++) {
									switch($ajaxVar[$i]){
										case $ajaxVar[2]:
											echo '
												<td>
												<input type="text" style="max-width: 100px;min-width: 100px;" class="status form-control bg-light"readonly value="', $row[$ajaxVar[$i]], '" data-bs-dismiss="modalPublicRecords">
											';
										break;
										case $ajaxVar[3]:
											echo '
												<td>
												<button class="formView btn fas fa-eye px-3 bg-info bg-gradient" href="#" value="',$row[$ajaxVar[0]],'">
											';
										break;
										case $ajaxVar[1]:
											echo '
												<td>',$row[$ajaxVar[$i]];
										break ;
										case $ajaxVar[0]:
											echo '<td>', $row[$ajaxVar[$i]];
										break;
									}

									echo '</td>';
								}
								echo '</tr>';
							}
							//include 'modal-schedule-details.php';
							?>
						</tbody>
					</table>
				</div>
				
			</div><!-- end of modal body-->
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->

<!-- Modal -->
<div class="modal" id="modalViewFormInfo" style="background: rgba(50,80,115,0.4);">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title title mini-title m-0 mt-2">
					<i class="fas fa-info-circle text-dark fa-lg"></i>
					<div class="d-inline">
						<h4 class="d-inline fw-bold formNumber"></h4>
						<h4 id="scheduleId" class="d-inline fw-bold"></label>
					</div>
				</h5>
				<a class="fas fa-times-circle fa-2x" data-bs-dismiss="modal" href="#"></a>
			</div>
			<div class="modal-body p-4" id="contentFormInfo">
				
			</div>
		</div><!-- end of modal content -->
	</div><!-- end of modal container -->
</div><!-- end of modal -->

<script>
	var form_id;
	var result = <?php echo json_encode($result);?>;
	var index;
	$(".formView").click(function(){
		form_id = $(this).val();

		for(let row in result){
			if(result[row]['id'] == form_id){
				index = row;
				break;
			}

		}
		let data  = `
				<div class="row mb-3">
					<div class="col">
						<label class="form-label fw-bold">Patient Name: </label>
						<p> 
							<?php echo $cookies['name'];?>
						</p>
					</div>
				</div>	
				<div class="row mb-3">
					<div class="col">
						<label class="form-label fw-bold">Condition(s): </label>
						<p> 
							`+ result[index]['condition'] +`
						</p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label fw-bold">Reason: </label>
						<p> 
							`+ result[index]['reason'] +`
						</p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
						<label class="form-label fw-bold">Status: </label>
						<p> 
							`+ result[index]['status'] +`
						</p>
					</div>
					<div class="col">
						<label class="form-label fw-bold">Date Assigned: </label>
						<p> 
							`+ result[index]['form_dateTime'] +`
						</p>
					</div>
				</div>
				`
		;
		$("h4.formNumber").text("Form #"+form_id);
		$("#contentFormInfo").html(data);
		$("#modalViewFormInfo").modal('show');
	});
</script>
