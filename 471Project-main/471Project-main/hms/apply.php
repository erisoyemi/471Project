<?php 

include("include/connection.php");



if(isset($_POST['apply'])) {

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];

	$error = array();

	if (empty($firstname)) {
		$error['apply'] = "Enter Firstname";
	} else if(empty($lastname)) {
		$error['apply'] = "Enter Lastname";
	} else if(empty($username)) {
		$error['apply'] = "Enter Username";
	} else if(empty($email)) {
		$error['apply'] = "Enter Email address";
	} else if($gender == "") {
		$error['apply'] = "Select Your Gender";
	} else if(empty($phone)) {
		$error['apply'] = "Enter Phone Number";
	} else if(empty($phone)) {
		$error['apply'] = "Enter Phone Number";
	} else if(empty($password)) {
		$error['apply'] = "Enter Password";
	} else if($confirm_password != $password) {
		$error['apply'] = "Both passwords do not match";
	}

	if(count($error) == 0) {

		$query = "INSERT INTO doctors(firstname, lastname, username, email, gender, phone, password, salary, date_reg, status, profile) VALUE('$firstname','$lastname','$username','$email','$gender','$phone','Password','0','NOW()','Pending','doc.jpg')";

		$result = mysqli_query($connect,$query);

		if ($result) {
			echo "<script>alert('You have Succuessfully Registered')</script>";

			header("Location: doctorlogin.php");
		} else {
			echo "<script>alert('Failed')</script>";
		}
	}
}
if(isset($error['apply'])) {
	$s = $error['apply'];

	$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
} else {
	$show = "";
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<?php  
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-3 jumbotron">
					<h5 class="text-center my-2">Register</h5>
						<div>
							<?php echo $show; ?>
						</div>

					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>">
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Lastname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname'] ?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email address" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
						</div>

						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>

						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'] ?>">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>

						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
						</div>

						<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
						<p>I already have an account <a href="doctorlogin.php">Click here</a></p>
						
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>