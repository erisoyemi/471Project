<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
								<h5 class="text-center">All Admins</h5>

								

								<?php

								$ad = $_SESSION['admin'];
								$query = "SELECT * FROM admin WHERE emp_no != '$ad'";
								$res = mysqli_query($connect,$query);

								 $output = "
								 	<table class='table table-bordered'>
								 	<tr>
									<th>Employee Number</th>
									<th>Restriction Level</th>
									<th>Action</th>
									<tr>
									";



								if (mysqli_num_rows($res) < 1) {

									$output .= "<tr><td colspan='3' class='text-center'>No New Admins</td></tr>";
								}

								while ($row = mysqli_fetch_array($res)) {
									$emp_no = $row['emp_no'];
									$restriction_level = $row['restriction_level'];

									$output .="
										<tr>
										<td>$emp_no</td>
										<td>$restriction_level</td>
										<td>
											<a href='admin?emp_no=$emp_no'><button emp_no='$emp_no' class='btn btn-danger remove'>Remove</button></a>
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

									$query = "DELETE FROM admin WHERE emp_no='$emp_no'";
									mysqli_query($connect,$query);
								}

								?>	

									

							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['add'])) {

										$emp_no = $_POST['emp_no'];
										$restriciton_level = $_POST['restriction_level'];

										$error = array();
										if (empty($emp_no)) {
											$error['u'] = "Enter Employee Number";
										} else if (empty($restriciton_level)) {
											$error['u'] = "Enter Restriciton Level";
										} 

										if (count($error) ==0) {
											$q = "INSERT INTO admin(emp_no,restriction_level)
												VALUES('$emp_no','$restriciton_level')";

											$result = mysqli_query($connect,$q);
                                            
											if ($result) {
												//move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
											} else{

											}
										}
									}


									if (isset($error['u'])) {
										$er = $error['u'];

										$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
									} else {
										$show = "";
									}
								?>

								<h5 class="text-center">Add Admin</h5>
								<form method="post" enctype="multipart/form-data">
									<div>
										<?php echo $show; ?>
									</div>
									<div class="from-group">
										<label>Employee Number</label>
										<input type="text" name="emp_no" class="form-control" autocomplete="off">
									</div>
									<div class="from-group">
										<label>Restriction Level</label>
										<input type="text" name="restriction_level" class="form-control">
									</div>

									<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
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