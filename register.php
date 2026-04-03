<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="register_section_class">
    <div class="form_container_class">
        <h2>Register for Tour</h2>

        <form action="insert.php" method="POST" id="registerForm">
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
            <input type="text" name="uname" id="uname" placeholder="Username" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="tel" name="mobile" id="mobile" placeholder="Mobile Number" required>
            <input type="password" name="pass" id="pass" placeholder="Password" required>

            <!-- Password Rules -->
            <div class="pass_rules">
                <p id="eCA">Uppercase letter missing</p>
                <p id="eSA">Lowercase letter missing</p>
                <p id="eD">Number missing</p>
                <p id="eSC">Special character missing</p>
            </div>

            <!-- Strength Bar -->
            <div class="strength_bar_class">
                <div class="strength_indicator_class" id="strengthIndicator"></div>
            </div>

            <button type="submit" class="btn_primary_class">Register</button>
        </form>
    </div>
</section>

<!-- Registration Popup -->
<div id="registrationPopup" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%);
    background:#4CAF50; color:#fff; padding:20px 30px; border-radius:12px; font-size:18px; text-align:center; z-index:10000;">
    Registration Successful ✅
</div>

<!-- JS Files -->
<script src="password.js"></script> <!-- Password validation -->
<script src="script.js"></script>   <!-- Other scripts: booking popup, gallery slider, etc. -->

</body>
</html>