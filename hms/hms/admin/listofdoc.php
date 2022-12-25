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
								<h5 class="text-center">All Doctors</h5>

								

								<?php

								$ad = $_SESSION['admin'];
								$query = "SELECT * FROM doctor WHERE emp_no != '$ad'";
								$res = mysqli_query($connect,$query);


								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
									<th>email</th>
									<th>emp_no</th>
									<th>job_title</th>
									<th>name</th>
									<th>phone_no</th>
									<th>password</th>
									<th>specialisation</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No Doctors</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$email = $row['email'];
									$phone_no = $row['phone_no'];
									$name = $row['name'];
									$emp_no = $row['emp_no'];
									$password = $row['password'];
									$specialisation = $row['specialisation'];
									$job_title = $row['job_title'];
									

									$output .="
										<tr>
										<td>$email</td>
										<td>$emp_no</td>
										<td>$job_title</td>
										<td>$name</td>
										<td>$phone_no</td>
										<td>$password</td>
                                        <td>$specialisation</td>
										
										<td>
											<a href='listofdoc?emp_no=$emp_no'><button emp_no=$emp_no class='btn btn-danger view'>Remove</button></a>
										</td>
									";
								}

								$output .="
									</tr>
								</table>
								";

								echo $output;
								
								if (isset($_GET['emp_no'])) {
									$emp_no= $_GET['emp_no'];

									$query = "DELETE FROM doctor WHERE emp_no='$emp_no'";
									mysqli_query($connect,$query);
								}
								
								?>	

									

							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['add'])) {

										$email = $_POST['email'];
										$job_title = $_POST['job_title'];
										$emp_no = $_POST['emp_no'];
										$name = $_POST['name'];
                                        $phone_no = $_POST['phone_no'];
                                        $specialisation = $_POST['specialisation'];
                                        $password = $_POST['password'];

										$error = array();
										if (empty($email)) {
											$error['u'] = "Enter Email";
										} else if (empty($job_title)) {
											$error['u'] = "Enter Job title";
										} else if (empty($emp_no)) {
											$error['u'] = "Enter Employee Number";
										} else if (empty($name)) {
											$error['u'] = "Enter Name";
										}else if (empty($phone_no)) {
											$error['u'] = "Enter Phone No";
										} else if (empty($specialisation)) {
											$error['u'] = "Enter Specialisation";
										} else if (empty($password)) {
											$error['u'] = "Enter Password";
										}

										if (count($error) ==0) {
											$q = "INSERT INTO doctor(email,job_title, emp_no, name, phone_no, specialisation, password)
												VALUES('$email','$job_title', '$emp_no', '$name', '$phone_no', '$specialisation', '$password')";

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

								<h5 class="text-center">Add New Doctor</h5>
								<form method="post" enctype="multipart/form-data">
									<div>
										<?php echo $show; ?>
									</div>
									<div class="from-group">
										<label>Employee Number</label>
										<input type="text" name="emp_no" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Job Title</label>
										<input type="text" name="job_title" class="form-control">
									</div>
									<div class="from-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Specialisation</label>
										<input type="text" name="specialisation" class="form-control">
									</div>
                                    <div class="from-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="from-group">
										<label>Phone Number</label>
										<input type="text" name="phone_no" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Name</label>
										<input type="text" name="name" class="form-control">
									</div>

									<input type="submit" name="add" value="Add New Doctor" class="btn btn-success">
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