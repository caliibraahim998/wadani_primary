<?php  
session_start();
if (isset($_SESSION["activeUser"]) && isset($_SESSION["user_id"]))
{

 if(isset($_COOKIE['email']) &&isset( $_COOKIE['user_password']))
 {
    unset($_SESSION["user_id"]);
    unset($_SESSION["activeUser"]);
    setcookie("email","",time()-60*60*24*7,"/");
    setcookie("user_password","",time()-60*60*24*7,"/");
    header("location:login.php");
 }
 else
 {
    unset($_SESSION["user_id"]);
    unset($_SESSION["activeUser"]);
    header("location:login.php");
 }

}
else
{
    header("location:../auth/index.php");
}
?>