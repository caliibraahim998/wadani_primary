<?php  
 
header('Content-Type: application/json');
// connection File 
include("../../admin/config/conn.php");


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../scool_management/vendor/autoload.php';


function SEND_EMAIL($username, $email, $user_token)
{
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'caliibraahim998@gmail.com';                     //SMTP username
    $mail->Password   = 'uvtd njwo jhbg uzoi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('caliibraahim998@gmail.com', 'School Management');
    $mail->addAddress($email, $username);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'School Management Email Verification';
    $mail->Body    = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3478f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .container h2 {
            color: #333333;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .container p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            background-color: #3478f7;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .container a:hover {
            background-color: #245ab3;
        }
        .container .link {
            color: #888888;
            font-size: 14px;
            margin-top: 20px;
            display: block;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">&#128276;</div>
        <h2>Verify your Email</h2>
        <p>Please  verify  Your Email To Complate Your  Registration my page.<br>
        Please verify this email address by clicking the button below.</p>
        <a href="http://localhost/scool_management/auth/verify.php?token='.$user_token.'" class="primary-btn">Verify;&nbsp;</a>
      <div class="footer">
      If You Dont Order This Request Dont Verify This  Email Verification
      </div>
      <div class="copyright">
      &copy; 2024-'. Date("Y").' Cali Ibraahim , All Rights Reserved.
      </div>
    </div>
</body>
</html>
';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode(
        ["status" =>"success","message" =>"Successfully Registered To Complete Your Registration Please Verify Your Email We send Email InTO This ('.$email.')"]);
} catch (Exception $e) {
    echo json_encode(
        ["status"=>"error", "message"=> "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]) ;
}
}

// Send the mail Forgot Password Start Here
function SEND_FORGOT_EMAIL($username,$email,$token){
    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'caliibraahim998@gmail.com';                     //SMTP username
    $mail->Password   = 'uvtd njwo jhbg uzoi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('caliibraahim998@gmail.com', 'School Management');
    $mail->addAddress($email, $username);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'School Management Email Verification';
    $mail->Body    = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reset Email</title>
</head>
<body>
    <style>
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        .container{
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 1px 2px 3px -1px rgba(0, 0, 0, 0.28);
            text-align: center;
            width: 70vh;
            /* height: 400px; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        #Amaah{
         background-color: #727cf5;
            padding: 20px;
            color:#fff;
            margin-bottom: 20px;
         }
        #code{
            color:#727cf5;
            margin-bottom: 20px;
        }
    </style>
    <div class='container'>
    <h1 id='Amaah'>Forget Email Message</h1>

    <h2>Hello <span id='code'>$username</span></h2>
    <p>Hi [Recipient's Name],

We received a request to reset the password for your account with Amaah Kaal. If you didn’t request this, you can safely ignore this email.

Here is your password reset code:

<a href='localhost/scool_management/auth/recovery_password.php'>Reset Password</a>


Enter this code on the password reset page to create a new password.

For security reasons, this code will expire in [timeframe, e.g., 15 minutes].

If you have any questions or need further assistance, feel free to contact our support team at [caliibraahim998@gmail.com].

Thank you,
The Amaah Kaal Team

</p>
    </div>
</body>
</html>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode(
        ["status" =>"success","message" =>"Success"]);
} catch (Exception $e) {
    echo json_encode(
        ["status"=>"error", "message"=> "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]) ;
}
}
// Send the mail Forgot Password end Here

// Making Action Start Here
if(isset($_POST['action']))
{
    $action=$_POST['action'];
    if(function_exists($action))
    {
        $action($conn);
    }
    else{
        echo json_encode(['status' => 'error', 'message' =>"Invalid action"]);
    }
}
else{
    echo json_encode(['status' => 'error','message' =>"Invalid action And Action Is Required"]);
}
// Making Action End Here

// Making Registration Start Here
function register($conn)
{
    if(isset($_POST['register']) && $_POST['register']=='Caaqil123')
    {
       extract($_POST);

    //    form Validation
    if(empty($username) && empty($email) && empty($password) && empty($cpassword))
    {
        echo json_encode(['status' => 'error','message' =>"All Fields Are Required"]);
    }
    else
    {
      $read_old=mysqli_query($conn, "SELECT * FROM manager WHERE email='$email' AND user_token='verified'");
      if($read_old && mysqli_num_rows($read_old)>0)
      {
        echo json_encode(['status' => 'error','message' =>"Email Already Exist"]);
      }
      else
      {
        $read_old2=mysqli_query($conn, "SELECT * FROM manager WHERE email='$email' AND user_token != 'verified'");
        if($read_old2 && mysqli_num_rows($read_old2)>0)
        {
            echo json_encode(['status' => 'error','message' =>"We Send Email To This  '$email' Please Verify "]);
        }
        else if($password == $cpassword)
        {
            $user_token =md5(rand());
            $hashPassword =password_hash ($password, PASSWORD_DEFAULT);
            $user_role = isset($_POST['user_role']) && $_POST['user_role'] == 'user';

            $register=mysqli_query($conn, "INSERT INTO manager (username,email,user_password,user_token, user_image,user_role)VALUES('$username','$email','$hashPassword','$user_token','../admin/images/user.png'),'$user_role'");
            if($register)
            {
                SEND_EMAIL($username,$email,$user_token);
            }
            else{
                echo json_encode(['status' => 'error','message' =>'Something went wrong registration']);
            }
        }
        else{
            echo json_encode(['status' => 'error','message' =>"Password And Confirm Password Does Not Match"]);
        }
      }
    }
    }
    else{
        echo json_encode(['status' => 'error','message' =>'Invalid Register and Password register Is Required']);
    }
}

// Making Registration End Here


//  Making Login Function Start Here

function login($conn)
{
    if (isset($_POST['login']) && $_POST['login'] == 'Caaqil123') {
        extract($_POST);

        // Form validation
        if (empty($email) || empty($Password)) { // Isku beddel && ilaa || si midkoodna email ama Password loo hubiyo
            echo json_encode(['status' => 'error', 'message' => "All Fields Are Required"]);
        } else {
            // Helitaanka email iyo hubinta inuu verified yahay
            $read_email = mysqli_query($conn, "SELECT * FROM manager WHERE email='$email' AND user_token='verified'");
            if ($read_email && mysqli_num_rows($read_email) > 0) {
                $row = mysqli_fetch_assoc($read_email);
                $hashPassword = $row['user_password'];

                // Hubinta password
                if (password_verify($Password, $hashPassword)) {
                    if ($row['user_token'] == 'verified') {
                        // Dejinta session
                        session_start();
                        // $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];

                        echo json_encode(['status' => 'success', 'message' => "Login Successful"]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => "Email Is Not Verified. Please Verify The Email"]);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => "Password Is Wrong"]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => "Email Is Not Verified or Does Not Exist"]);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => "Invalid Login Request"]);
    }
}


//  Making Login Function End  Here

//  Making Forget Password Function satrt  Here
function forgetPassword($conn){
    if(isset($_POST['forgetPassword']) && $_POST['forgetPassword']=='Caaqil123')
    {
        extract($_POST);
        if(empty($email)){
            echo json_encode(['status' => 'error','message' =>"Email Is Required"]);
        }
        else{
            $read_email=mysqli_query($conn, "SELECT * FROM manager WHERE email='$email' AND user_token='verified'");
            if($read_email && mysqli_num_rows($read_email)>0)
            {
                $row=mysqli_fetch_assoc($read_email);
               $username=$row['username'];
               $token=$row['user_token'];
               SEND_FORGOT_EMAIL($username,$email,$token);
               echo json_encode(['status' => 'success','message' =>'successfully, We Are Sending Email Address To reset Your Password']);
            }
            else{
                echo json_encode(['status' =>'error', 'message' =>'Email is not Verified please Verify your email address']);
            }
        }
    }
    else{
        echo json_encode(['status' =>'error', 'message' =>'invalid forgot password']);

    }
}
//  Making Forget Password Function End  Here


//  Making Recovery Password Function End  Here
function recoveryPassword($conn){
    if(isset($_POST['recoveryPassword']) && $_POST['recoveryPassword']=='Caaqil123'){
        extract($_POST);
        if(empty($email) ||  empty($password) || empty($cpassword)){
            echo json_encode(['status' => 'error','message' =>"All Fields Are Required"]);
        }else{
            $read_email =mysqli_query($conn, "SELECT * FROM manager WHERE email='$email'");
        if($read_email && mysqli_num_rows($read_email)>0)
        {
          $row=mysqli_fetch_assoc($read_email);
          $token=$row['user_token'];
          if($password==$cpassword){
            $hashPassword = password_hash ($password, PASSWORD_DEFAULT);
            $update_password=mysqli_query($conn, "UPDATE manager SET user_password='$hashPassword' WHERE email='$email'");
            if($update_password){
                echo json_encode(['status' =>'success','message' =>'Password Successfully Updated']);
            }
            else{
                echo json_encode(['status' => 'error','message' =>'Something went wrong password update']);
            }
          }
          else{
            echo json_encode(['status' => 'error','message' =>'Password and Comfirm password DO NOT match']);
          }
        }
        else{
            echo json_encode(['status' => 'error','message' =>'Email is not Exist']);
        }
        }
    }
    else{
        echo json_encode(['status' => 'error','message' =>'Invalid recovery password']);
    }
}
//  Making Recovery Password Function End  Here


?>