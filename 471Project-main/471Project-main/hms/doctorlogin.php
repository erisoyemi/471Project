<?php 

include("include/connection.php");

if (isset($_POST['login'])) {



	$uname = $_POST['uname'];
	$password = $_POST['pass'];


	$error = array();

	$q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
	$qq = mysqli_query($connect,$q);

	$row = mysqli_fetch_array($qq);

	if (empty($uname)) {
		$error['login'] = "Enter Username";
	} else if(empty($password)) {
		$error['login'] = "Enter Password";
	} else if ($row['status'] == "Pending") {
		$error['login'] = "Please wait for the admin to confirm status";
	} else if ($row['status'] == "Rejected") {
		$error['login'] = "Try again later";
	}

	if(count($error)==0) {
		$query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";

		$res = mysqli_query($connect,$query);

		if(mysqli_num_rows($res)) {
			echo "<script>alert('Done')</script>";
			$_SESSION['doctor'] = $uname;
			//header("Location");
		} else {
			echo "<script>alert('Invalid Account')</script>";
		}
	}

}

if(isset($error['login'])) {
	$l = $error['login'];

	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
	$show = "";
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login Page</title>
</head>
<body>

	<?php  
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-3">
					<h5 class="text-center my-2">Doctors Login</h5>
						<div>
							<?php echo $show; ?>
						</div>

					<form method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off">
						</div>

						<input type="submit" name="login" class="btn btn-success" value="Login">

						<p>I don't have an account <a href="apply.php">Register</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>