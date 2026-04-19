<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';

// Collect user info safely
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$username = mysqli_real_escape_string($con, $_POST['uname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$password = mysqli_real_escape_string($con, $_POST['pass']);

// Insert user
$sql_user = "INSERT INTO users(fname,lname,username,email,mobile,password) 
             VALUES('$fname','$lname','$username','$email','$mobile','$password')";

if(mysqli_query($con, $sql_user)){
    echo "<script>
            alert('Registration Successful ✅');
            window.location.href='login.php';
          </script>";
}else{
    echo "<script>
            alert('Registration Failed: ".mysqli_error($con)."');
            window.location.href='register.php';
          </script>";
}
?>