<?php
session_start();

if(isset($_GET['package'])){
    $_SESSION['selected_package'] = $_GET['package']; // 'coxsbazar', 'sajek', or 'sylhet'
    header("Location: register.php"); // redirect to registration/login
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>