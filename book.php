<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_SESSION['user'];
    $package = $_POST['package'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $travel_date = $_POST['travel_date'] ?? '';
    $return_date = $_POST['return_date'] ?? '';
    $people = $_POST['people'] ?? '';
    $room_type = $_POST['room_type'] ?? '';
    $transport = $_POST['transport'] ?? '';
    $created_at = date('Y-m-d H:i:s');

    if($fullname && $email && $mobile && $travel_date && $return_date && $people && $room_type && $transport){
        $stmt = $con->prepare("INSERT INTO bookings (username, package, fullname, email, mobile, travel_date, return_date, people, room_type, transport, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $username, $package, $fullname, $email, $mobile, $travel_date, $return_date, $people, $room_type, $transport, $created_at);
        $stmt->execute();
        $stmt->close();

        $_SESSION['show_popup'] = "Booking Successful! Thank you for choosing TravelBD.";
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['show_popup'] = "Error: Please fill all required fields.";
        header("Location: dashboard.php");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>