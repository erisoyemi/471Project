<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title> List of Users</title>
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
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h5 class="text-center">All Users</h5>

								

								<?php

								$ad = $_SESSION['admin'];
								$query = "SELECT * FROM user WHERE email != '$ad'";
								$res = mysqli_query($connect,$query);

								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
									<th>Employee Number</th>
									<th>Restriction Level</th>
                                    <th>Password</th>
									<th>Action</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No Users</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$email = $row['email'];
									$restriction_level = $row['restriction_level'];
                                    $password = $row['password'];

									$output .="
										<tr>
										<td>$email</td>
										<td>$restriction_level</td>
                                        <td>$password</td>
										<td>
											<a href='listofusers?email=$email'><button email=$email class='btn btn-danger remove'>Remove</button></a>
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

									$query = "DELETE FROM user WHERE email='$email'";
									mysqli_query($connect,$query);
								}

								?>	

									

							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['add'])) {

										$email = $_POST['email'];
										$restriction_level = $_POST['restriction_level'];
                                        $password = $_POST['password'];

										$error = array();
										if (empty($email)) {
											$error['u'] = "Enter Email";
										} else if (empty($restriction_level)) {
											$error['u'] = "Enter Restriction Level";
										} else if (empty($password)) {
											$error['u'] = "Enter Password";
										} 

										if (count($error) ==0) {
											$q = "INSERT INTO user(email,restriction_level,password)
												VALUES('$email','$restriction_level', '$password')";

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

								<h5 class="text-center">Add User</h5>
								<form method="post" enctype="multipart/form-data">
									<div>
										<?php echo $show; ?>
									</div>
									<div class="from-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Restriction Level</label>
										<input type="text" name="restriction_level" class="form-control">
									</div>
                                    <div class="from-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>

									<input type="submit" name="add" value="Add New User" class="btn btn-success">
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