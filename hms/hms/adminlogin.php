<?php
session_start();
    include("include/connection.php");

if (isset($_POST['login'])){
    $emp_no = $_POST['emp_no'];
    $password = $_POST['password'];

    $error = array();

    if (empty($emp_no)){
        $error['admin'] = "Enter Employee Number";
    }
    else if (empty($password)){
        $error['admin'] = "Enter Password";
    }

    if (count($error)==0) {
        $query = "SELECT * FROM admin WHERE emp_no='$emp_no' AND password='$password'";
        $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('Login Successful')</script>";

            $_SESSION['admin'] = $emp_no;

            header("Location:admin/index.php");
            exit();
        
        }else{
            echo "<script>alert('Invalid Employee Number')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Admin Login Page</title>
</head>
<body>

<?php
    include("include/header.php");
    ?>

    <div style="margin-top: 100px"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h5 class="text-center my-2">Admin Login</h5>
                    <form method="post">

                        <div class="alert alert-danger">
                            <?php
                            if (isset($error['admin'])) {

                                $sh = $error['admin'];

                                $show = "<h4 class='alert alert-danger'>$sh</h4>";
                            }else{
                                $show = "";
                            }
                            echo $show;
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Employee Number</label>
                            <input type="text" name="emp_no" class="form=control" autocomplete="off" placeholder="Enter Employee Number">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form=control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        
                        
                        <input type="submit" name="login" class="btn btn-success" value="login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </div>

</body>
</html>