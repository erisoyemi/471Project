<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

	<title></title>
</head>
<body>

	<?php
	include("../include/header.php");
	include("../include/connection.php");

	$ad = $_SESSION['admin'];

	$query = "SELECT * FROM admin WHERE username = '$ad'";

	$res = mysqli_query($connect, $query);

	while ($row = mysqli_fetch_array($res)) {
		$username = $row['username'];
		$profiles = $row['profile'];
	}

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
			<div class="col-md-2" style="margin-left: -10px;">
				<?php
				include("sidenav.php");

				?>
			</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4><?php echo $username; ?> Profile</h4>

								<?php 

									if (isset($_POST['update'])) {

										$profile = $_FILES['profile']['name'];

										if (empty($profile)) {

										} else {
											$query = "UPDATE admin SET profile ='$profile' WHERE username = 'ad'";

											$result = mysqli_query($connect,$query);

											if ($result) {
												move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
											}

										}
									}

								?>

								<form method="post" enctype="multipart.form-data">
								<?php
								echo "<img src='img/$profiles' class='col-md-12' style='height: 250px;'>";
								?>

								<br><br>
								<div class="form-group">
									<label>UPDATE PROFILE</label>
									<input type="file" name="profile" class="form-control">
								</div>
								<br>
								<input type="submit" name="update" value="UPDATE" class="btn btn-success">
								</form>
							</div>
							<div class="col-md-6">

								<?php 

								if (isset($_POST['change'])) {

									$uname = $_POST['uname'];

									if (empty($uname)) {

									} else {
										$query = "UPDATE admin SET username'$uname' WHERE username='$ad'";

										$res = mysqli_query($connect,$query);

										if ($res) {

											$_SESSION['admin'] = $uname;
										}
									}
								}

								 ?>

								<form method="post">
									<label>Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form>


								<br>

								<?php 

								if (isset($_POST['update_pass'])) {

									$old_pass = $_POST['old_pass'];
									$new_pass = $_POST['new_pass'];
									$con_pass = $_POST['con_pass'];

									$error = array();

									$old = mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");

									$row = mysqli_fetch_array($old);
									$pass = $row['password'];

									if (empty($old_pass)) {
										$error['p'] = "Enter old password";
									} else if (empty($new_pass)) {
										$error['p'] = "Enter New Password";
									} else if (empty($con_pass)) {
										$error['p'] = "Confirm Password";
									} else if ($old_pass != $pass) {
										$error['p'] = "Invalid Old Password";
									} else if ($new_pass != $con_pass) {
										$error['p'] = "Both passwords do not much";
									}

									if (count($error)==0) {
										$query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";

										mysqli_query($connect,$query);
									}

										
								}

								if (isset($error['p'])) {
											$e = $error['p'];

											$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
										} else {
											$show ="";
										}

								 ?>

								<form method="post">
									<h5 class="text-center my-4">Change Password</h5>
									<div>
										<?php 
										 echo $show;
										 ?>
									</div>

									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control">
									</div>

									<input type="submit" name="update_pass" value="Update Password" class="btn btn-info">

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