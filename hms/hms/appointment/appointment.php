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
								<h5 class="text-center">All Appointments</h5>

								

								<?php

								$ad = $_SESSION['doctor'];
								$query = "SELECT * FROM appointment WHERE appointment_no != '$ad'";
								$res = mysqli_query($connect,$query);


								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
									<th>Appointment Number</th>
									<th>Time</th>
									<th>Date</th>
									<th>Employee Number</th>
									<th>Patient_no</th>
                                    <th>Action</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No Appointments</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$appointment_no = $row['appointment_no'];
									$time = $row['time'];
									$date = $row['date'];
									$emp_no = $row['emp_no'];
									$patient_no = $row['patient_no'];
									

									$output .="
										<tr>
										<td>$appointment_no</td>
										<td>$time</td>
										<td>$date</td>
										<td>$emp_no</td>
										<td>$patient_no</td>
										
										<td>
											<a href='appointment?appointment_no=$appointment_no'><button appointment_no=$appointment_no class='btn btn-danger view'>Remove</button></a>
										</td>
									";
								}

								$output .="
									</tr>
								</table>
								";

								echo $output;
								
								if (isset($_GET['appointment_no'])) {
									$appointment_no= $_GET['appointment_no'];

									$query = "DELETE FROM appointment WHERE appointment_no='$appointment_no'";
									mysqli_query($connect,$query);
								}
								
								?>	

									

							</div>
							
						</div>
					</div>					
				</div>

			</div>			
		</div>
	</div>
</body>
</html>