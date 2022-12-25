<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
</head>
<body>
	<?php
	
	include("../include/header.php");
	include("../include/connection.php")

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -10px;">
					<?php
					include("sidenav.php");
					include("../include/connection.php")
					?>
				</div>

				<div class="col-md-10">
					<div class="col-md-20">
						<div class="row">
							<div class="col-md-7">

		

									

							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['add'])) {

										$patient_no = $_POST['patient_no'];
										$date = $_POST['date'];
										$emp_no = $_POST['emp_no'];
										$time = $_POST['time'];

										$error = array();
										if (empty($patient_no)) {
											$error['u'] = "Enter Patient Number";
										} else if (empty($date)) {
											$error['u'] = "Enter Appointment Date";
										} else if (empty($emp_no)) {
											$error['u'] = "Enter Employee Number";
										} else if (empty($time)) {
											$error['u'] = "Enter Appointment Time";
										}

										if (count($error) ==0) {
											$q = "INSERT INTO appointment(emp_no,time, date, patient_no)
												VALUES('$emp_no','$time', '$date', '$patient_no')";

											$result = mysqli_query($connect,$q);
                      
										}
									}


									if (isset($error['u'])) {
										$er = $error['u'];

										$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
									} else {
										$show = "";
									}
								?>

								<h5 class="text-center">Add Appointment</h5>
								<form method="post" enctype="multipart/form-data">
									<div>
										<?php echo $show; ?>
									</div>
									<div class="from-group">
										<label>Patient Number</label>
										<input type="text" name="patient_no" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Date</label>
										<input type="date" name="date" class="form-control">
									</div>
									<div class="from-group">
										<label>Doctor Employee Number</label>
										<input type="text" name="emp_no" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Time</label>
										<input type="text" name="time" class="form-control">
									</div>

									<input type="submit" name="add" value="Add New Appointment" class="btn btn-success">
								</form>
							</div>
						</div>
					</div>					
				</div>

			</div>			
		</div>
	</div>
</body>
</html>