<?php  
session_start();
if (isset($_SESSION["activeUser"]) && isset($_SESSION["user_id"]))
{
 
}
else
{
    header("location:../auth/login.php");
}
?>