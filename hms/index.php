<!DOCTYPE html>
<html>
<head>
    <title>HMS Home Page</title>
</head>
<body>
    
    <?php
    include("include/header.php")
    ?>

    <div style="margin-top: 50px"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/admin.jpg" style="width: 100%;">
                    <h5 class="text-center">Log in here for admin</h5>

                    <a href="adminlogin.php">
                        <button class="btn btn-success"> LOG IN</button>
                    </a>
                </div>
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/patient.jpg" style="width: 100%;">
                    <h5 class="text-center">Log in here for patients</h5>

                    <a href="#">
                        <button class="btn btn-success"> LOG IN</button>
                    </a>

                </div>
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/doc.jpg" style="width: 100%;">

                    <h5 class="text-center">Log in here for doctors</h5>

                    <a href="doctorlogin.php">
                        <button class="btn btn-success"> LOG IN</button>
                    </a>

                </div>
            </div>
        </div>
    </div>

</body>
</html>