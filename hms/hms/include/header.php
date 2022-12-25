<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white"> Hospital Management System</h5>

        <div class="mr-auto"></div>

        <ul class="navbar-nav">
           <?php
                if(isset($_SESSION['admin'])){

               $user = $_SESSION['admin'];
                    echo ' 
                    
                    <li class="nav-item"><a href="../admin/index.php" class="nav-link text-white">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout </a></li>'
                    ;
                }else if(isset($_SESSION['doctor'])){

                    $user = $_SESSION['doctor'];
                         echo ' 
                         
                         <li class="nav-item"><a href="../doctor/doctor.php" class="nav-link text-white">'.$user.'</a></li>
                         <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout </a></li>'
                         ;
                     }
                else if(isset($_SESSION['user'])){

                $user = $_SESSION['user'];
                        echo ' 
                        
                        <li class="nav-item"><a href="../doctor/doctor.php" class="nav-link text-white">'.$user.'</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout </a></li>'
                        ;
                    }
                
                else{
                    echo '
                    <li class="nav-item"><a href="../index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="../adminlogin.php" class="nav-link text-white">Admin</a></li>
                    <li class="nav-item"><a href="../doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                    <li class="nav-item"><a href="../userlogin.php" class="nav-link text-white">User</a></li>'
                    ;
                }
           ?>
        </ul>

    </nav>

</body>
</html>