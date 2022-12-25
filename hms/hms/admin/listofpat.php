<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patients</title>
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

								$ad = $_SESSION['admin'];
								$query = "SELECT * FROM patient WHERE patient_no != '$ad'";
								$res = mysqli_query($connect,$query);


								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
                                    <th>patient_no</th>
									<th>email</th>
									<th>fname</th>
									<th>lname</th>
									<th>phone_no</th>
									<th>gender</th>
									<th>age</th>
									<th>weight</th>
                                    <th>height</th>
									<th>room_no</th>
									<th>insurance_name</th>
									<th>race</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No Patients</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$email = $row['email'];
									$phone_no = $row['phone_no'];
									$fname = $row['fname'];
                                    $lname = $row['lname'];
									$gender = $row['gender'];
									$age = $row['age'];
									$weight = $row['weight'];
									$height = $row['height'];
                                    $insurance_name = $row['insurance_name'];
                                    $race = $row['race'];
                                    $room_no = $row['room_no'];
									

									$output .="
										<tr>
										<td>$email</td>
										<td>$phone_no</td>
										<td>$fname</td>
										<td>$lname</td>
										<td>$gender</td>
										<td>$age</td>
                                        <td>$weight</td>
                                        <td>$height</td>
                                        <td>$insurance_name</td>
                                        <td>$race</td>
                                        <td>$room_no</td>
										
										<td>
											<a href='listofpat?email=$email'><button email=$email class='btn btn-danger view'>Remove</button></a>
										</td>
									";
								}

								$output .="
									</tr>
								</table>
								";

								echo $output;
								
								if (isset($_GET['email'])) {
									$email= $_GET['email'];

									$query = "DELETE FROM patient WHERE email='$email'";
									mysqli_query($connect,$query);
								}
								
								?>	

									

							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['add'])) {

										$email = $_POST['email'];
										$fname = $_POST['fname'];
										$lname = $_POST['lname'];
										$gender = $_POST['gender'];
                                        $age = $_POST['age'];
                                        $gender = $_POST['gender'];
                                        $weight = $_POST['weight'];
                                        $height = $_POST['height'];
                                        $insurance_name = $_POST['insurance_name'];
                                        $race = $_POST['race'];
                                        $room_no = $_POST['room_no'];

										$error = array();
										if (empty($email)) {
											$error['u'] = "Enter Email";
										} else if (empty($fname)) {
											$error['u'] = "Enter First Name";
										} else if (empty($lname)) {
											$error['u'] = "Enter Last Name";
										} else if (empty($gender)) {
											$error['u'] = "Enter Gender";
										}else if (empty($age)) {
											$error['u'] = "Enter Age";
										} else if (empty($weight)) {
											$error['u'] = "Enter Weight";
										} else if (empty($height)) {
											$error['u'] = "Enter Height";
										}else if (empty($insurance_name)) {
											$error['u'] = "Enter insurance_name";
										}else if (empty($race)) {
											$error['u'] = "Enter race";
										}else if (empty($room_no)) {
											$error['u'] = "Enter room_no";
										}
                                        

										if (count($error) ==0) {
											$q = "INSERT INTO patient(email,fname, lname, gender, age, weight, height, insurance_name, race, room_no)
												VALUES('$email','$fname', '$lname', '$gender', '$age', '$weight', '$height', '$insurance_name', '$race', '$room_no')";

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

								<h5 class="text-center">Add New Patients</h5>
								<form method="post" enctype="multipart/form-data">
									<div>
										<?php echo $show; ?>
									</div>
									<div class="from-group">
										<label>First Name</label>
										<input type="text" name="fname" class="form-control" autocomplete="off">
									</div>
                                    <div class="from-group">
										<label>Last Name</label>
										<input type="text" name="lname" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Gender</label>
										<input type="text" name="gender" class="form-control">
									</div>
									<div class="from-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Age</label>
										<input type="text" name="age" class="form-control">
									</div>
                                    <div class="from-group">
										<label>Weight</label>
										<input type="text" name="weight" class="form-control">
									</div>
									<div class="from-group">
										<label>Height</label>
										<input type="text" name="height" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Insurance Name</label>
										<input type="text" name="insurance_name" class="form-control">
									</div>
                                    <div class="from-group">
										<label>Race</label>
										<input type="text" name="race" class="form-control">
									</div>
                                    <div class="from-group">
										<label>Room Number</label>
										<input type="text" name="room_no" class="form-control">
									</div>

									<input type="submit" name="add" value="Add New Patient" class="btn btn-success">
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