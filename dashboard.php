<?php
session_start();
include 'connection.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
$package = $_SESSION['selected_package'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard - TravelBD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if(isset($_SESSION['show_popup'])): ?>
<div class="popup_form_class" id="bookingPopup">
    <div class="popup_content_class">
        <span class="close_btn_class" onclick="closePopup()">&times;</span>
        <p><?php echo $_SESSION['show_popup']; ?></p>
    </div>
</div>
<?php 
unset($_SESSION['show_popup']); 
endif; ?>

<!-- Header -->
<header class="header_class">
    <nav class="navbar_class">
        <div class="logo_class"><a href="#">TravelBD</a></div>
        <ul class="nav_links_class">
            <li>Welcome, <?php echo htmlspecialchars($username); ?>!</li>
            <li><a href="index.html">Logout</a></li>
        </ul>
    </nav>
</header>

<div class="container_class">

<?php if(in_array($package, ['coxsbazar','sajek','sylhet'])): ?>

    <h2 class="section_title_class">
        <?php 
        if($package == 'coxsbazar') echo "Cox’s Bazar Tour 🌊";
        elseif($package == 'sajek') echo "Sajek Valley Tour ⛰️";
        else echo "Sylhet Nature Tour 🍃";
        ?>
    </h2>

    <img src="images/<?php 
        if($package == 'coxsbazar') echo 'coxsbazar.jpg';
        elseif($package == 'sajek') echo 'sajek.jpg';
        else echo 'sylhet.jpg';
    ?>" class="package_image_class">

    <p class="package_desc_class">
        <?php 
        if($package == 'coxsbazar'){
            echo "Cox’s Bazar is the longest sea beach in the world. Enjoy beautiful sunsets and relaxing waves.";
        } elseif($package == 'sajek'){
            echo "Sajek Valley is a beautiful hill station in Bangladesh. Enjoy the green hills, rivers, and peaceful nature.";
        } else {
            echo "Sylhet is famous for its tea gardens, waterfalls, and serene green landscapes. Perfect for nature lovers.";
        }
        ?>
    </p>


    <form action="book.php" method="POST" class="booking_form_class">
        <input type="hidden" name="package" value="<?php echo ucfirst($package); ?>">

        <label>Full Name:</label>
        <input type="text" name="fullname" class="input_class" required>

        <label>Email:</label>
        <input type="email" name="email" class="input_class" required>

        <label>Mobile Number:</label>
        <input type="text" name="mobile" class="input_class" required>

        <label>Travel Date:</label>
        <input type="date" name="travel_date" class="input_class" required>

        <label>Return Date:</label>
        <input type="date" name="return_date" class="input_class" required>

        <label>Number of People:</label>
        <input type="number" name="people" class="input_class" min="1" required>

        <label>Room Type:</label>
        <select name="room_type" class="input_class">
            <option value="standard">Standard</option>
            <option value="deluxe">Deluxe</option>
            <option value="premium">Premium</option>
        </select>

        <label>Transport Type:</label>
        <select name="transport" class="input_class">
            <option value="bus">Bus</option>
            <option value="flight">Flight</option>
        </select>

        <button type="submit" class="btn_primary_class">Confirm Booking</button>
    </form>

    <h3 class="map_title_class">Location Map</h3>
    <iframe 
        src="<?php 
            if($package == 'coxsbazar') echo "https://www.google.com/maps?q=Cox's+Bazar&output=embed";
            elseif($package == 'sajek') echo "https://www.google.com/maps?q=Sajek+Valley&output=embed";
            else echo "https://www.google.com/maps?q=Sylhet&output=embed";
        ?>" 
        class="map_class">
    </iframe>

<?php else: ?>

    <h2 class="section_title_class">Welcome to Dashboard</h2>
    <p class="section_subtitle_class">Select a package from home page to continue.</p>

<?php endif; ?>

</div>

<script>
function closePopup() {
    document.getElementById('bookingPopup').style.display = 'none';
}


window.onload = function() {
    let popup = document.getElementById('bookingPopup');
    if(popup){
        setTimeout(() => { popup.style.display = 'none'; }, 5000);
    }
}
</script>

</body>
</html>