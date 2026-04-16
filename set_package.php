<?php
session_start();
if(isset($_GET['package'])){
    $_SESSION['selected_package'] = $_GET['package']; 
    header("Location: register.php"); 
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>