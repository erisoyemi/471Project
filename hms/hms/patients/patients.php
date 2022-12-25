<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
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
								<h5 class="text-center">All Patients</h5>

								

								<?php
								
								$ad = $_SESSION['doctor'];
								$query = "SELECT * FROM patient WHERE patient_no != '$ad'";
								$res = mysqli_query($connect,$query);


								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
									<th>Patient Number</th>
									<th>Phone_no</th>
									<th>First name</th>
									<th>Last Name</th>
									<th>Age</th>
									<th>Email</th>
									<th>Race</th>
									<th>Height</th>
									<th>Weight</th>
									<th>Gender</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No Patients</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$patient_no = $row['patient_no'];
									$phone_no = $row['phone_no'];
									$fname = $row['fname'];
									$lname = $row['lname'];
									$age = $row['age'];
									$email = $row['email'];
									$race = $row['race'];
									$height = $row['height'];
									$weight = $row['weight'];
									$gender = $row['gender'];

									$output .="
										<tr>
										<td>$patient_no</td>
										<td>$phone_no</td>
										<td>$fname</td>
										<td>$lname</td>
										<td>$age</td>
										<td>$email</td>
										<td>$race</td>
										<td>$height</td>
										<td>$weight</td>
										<td>$gender</td>
										<td>
											<a href='patient?patient_no=$patient_no'><button patient_no=$patient_no class='btn btn-danger view'>Remove</button></a>
										</td>
									";
								}

								$output .="
									</tr>
								</table>
								";

								echo $output;
								
								?>	

									

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
										<label>Employee Number</label>
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