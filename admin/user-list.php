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
			<!-- Display the list below -->
			<!-- ung ginawa mo adrean <div id="displayConsultant"></div>-->
			
			
			<!-- myTable -->
			<table class="table table-hover align-middle" id="myTable">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<?php 
							for($i = 1; $i <count($placeholder); $i++)
								echo '<th>',$placeholder[$i],'</th>';
							echo '<td>Edit/Delete</td>';
						?>
					</tr>
				</thead>
				<tbody>
	                <?php
				while($row = $result->fetch_assoc()) {
					echo '<tr>';
					for($i = 0; $i <count($ajaxVar); $i++)
						echo '<td>',$row[$ajaxVar[$i]],'</td>';
					echo '
						<td>
							<a class="del far fa-trash-alt" href="#" value="',$row[$ajaxVar[0]],'"/>
							<a class="chg far fa-edit px-3" href="#" value="',$row[$ajaxVar[0]],'"/>
							<a class="upd far fa-check-square" href="#" value="',$row[$ajaxVar[0]],'"style="display:none"/>
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
	/** ung ginawa mo adrean
	$(document).ready(displayConsultantList());

	function displayConsultantList() {
		var str = "all"
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("displayConsultant").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "handlers/displayConsultantHandler.php?q=" + str, true);
		xmlhttp.send();
	}
	*/
	
	//mine's below
	$(document).ready(function () {
	    $('#myTable').dataTable();
	});
	
	//delete function per Table Row
		$('.del').click(function(){
			$(this).parent().parent().hide();
			deleteRecord($(this).attr("value"));
		});
	//change function per Table Row
		$('.chg').click(function(){
			<?php 
				for($i = 1; $i < count($ajaxVar); $i++)
					echo '$(this).parent().parent().find(\'td:eq(',$i,')\').html("<input>");';
			?>
			$(this).hide();
			$(this).parent().find('a:eq(0)').hide();
			$(this).parent().find('a:eq(2)').show();
		});

	//update function per Table Row
	$('.upd').click(function(){
		updateRecord($(this).parent().parent());
	});
	//UPDATE
		function updateRecord(e){
			$.ajax({
				'url':"endpoints/consultant/consultantUpdate.php",
				'type':"POST",
				'data':{
					<?=$ajaxVar[0]?>: $(e).find('td:eq(0)').text(),
					<?php 
						for($i = 1; $i <count($ajaxVar); $i++)
							echo $ajaxVar[$i],': $(e).find(\'td:eq(',$i,')\').find(\'input\').val(),';
					?>
				},
				success: function(response){
					response = JSON.parse(response);
					if(response.code == 200){

						window.location.reload()
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
	//DELETE
		function deleteRecord(record){
			$.ajax({
				'url':"endpoints/consultant/consultantDelete.php",
				'type':"POST",
				'data':{
					<?=$ajaxVar[0]?>: record,
				},
				success: function(response){
					response = JSON.parse(response);
					if(response.code == 200){
						console.log(response.code);
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
