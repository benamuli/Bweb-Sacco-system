<?php
session_start();
include('./includes/connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    if (!empty($Username) && !empty($Password) && !is_numeric($Username)) {
        //read from db
        $query = "SELECT * FROM users where Username = '$Username' limit 1";
        $results = mysqli_query($con, $query);
    }
    if ($results) {
        if ($results && mysqli_num_rows($results) > 0) {
            $user_data = mysqli_fetch_assoc($results);
            if ($user_data['Password'] === $Password) {
                $_SESSION['Username'] = $user_data['Username'];
                while ($row = mysqli_fetch_assoc($results)) {
                    echo '<h1>' . $row["Username"] . ' </h1>';
                    echo '<div> ' . $row["Password"] . ' </div>';

                }
                // echo "Welcome $_SESSION[Username]";
                header("Location: index.php");
                die;

            } else {
                echo "wrong username or password";

            }
        } else {
            echo 'No user found,please sign up';
            header("location: register.php");
            die;

        }
    }

} 
// else {
//     echo "oops! wrong username or password";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jumbo Nuts Sacco - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                   
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        
                            <div class="col-lg-6 d-none d-lg-block bg-gray-300">
                            <img  src="assets/jumbo nuts.png">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="Post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="Username" name="Username"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password" name="Password"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- submit -->
                                        <div class="col-md-4">
                                            <div class="form-outline mb-4 w-50 m-auto">
                                                <input class="btn btn-primary mb-2 px-3C" type="submit" name="submit"
                                                    value="Login">
                                            </div>
                                        </div>
                                        <!-- <a href="index.php" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <!-- <hr>
                                        <a href="404.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="404.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>