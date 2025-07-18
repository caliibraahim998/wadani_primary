<?php  
// Callng Connection File
include("../admin/config/conn.php");
session_start();
if (isset($_SESSION["activeUser"]))
{
   header("Location:../admin");
}
else
{

}
// Auto Login Starting Here
if(isset($_COOKIE['email']) &&isset( $_COOKIE['password']))
{
  $email = $_COOKIE['email'];
    $password=$_COOKIE['password'];
    // Automatic Login from
    $read=mysqli_query($conn, "SELECT * FROM manager WHERE email='$email'");
    if($read && mysqli_num_rows($read)>0)
{
    echo "success";
    $row=mysqli_fetch_assoc($read);
    $oldPassword=$row['user_password'];
 
   
    $_SESSION['id']=$row['id'];
    $_SESSION['activeUser']=true;
    setcookie("email","$email",time()+60*60*24*7,"/");
    setcookie("password","$oldPassword",time()+60*60*24*7,"/");
  
  
}
else{
  

   unset( $_SESSION['user_id']);
   unset( $_SESSION['activeUser']);
   setcookie("email","$email",time()-60*60*24*7,"/");
   setcookie("password","$oldPassword",time()-60*60*24*7,"/");
}

}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/images/favicon.png">
    <link href="../admin/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="LoginForm" method="post">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Password">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Your Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" id="remember" name="remember" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="btnLogin" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="register.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../admin/vendor/global/global.min.js"></script>
	<script src="../admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../admin/js/custom.min.js"></script>
    <script src="../admin/js/dlabnav-init.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/app.js"></script>

</body>

</html>