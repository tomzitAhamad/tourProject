<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'connection.php';

$username = $_POST['uname'];
$password = $_POST['pass'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$run = mysqli_query($con,$sql) or die(mysqli_error($con));

if(mysqli_num_rows($run) == 1){
    $_SESSION['user'] = $username;
    // Redirect to dashboard.php instead of show.php
    header("Location:  dashboard.php");
    exit();
}else{
    // Show popup alert for invalid login
    echo "<script>
            alert( 'Invalid Username or Password');
            window.location.href='login.php';
          </script>";
}
?>