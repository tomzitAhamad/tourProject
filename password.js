document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");
    const passField = document.getElementById("pass");
    const popup = document.getElementById("registrationPopup");
    const strengthIndicator = document.getElementById("strengthIndicator");

    // ========================
    // STRONG PASSWORD CHECK
    // ========================
    function strongPassword(password) {
        const errors = [];
        if (!/[A-Z]/.test(password)) errors.push("Uppercase letter missing");
        if (!/[a-z]/.test(password)) errors.push("Lowercase letter missing");
        if (!/[0-9]/.test(password)) errors.push("Number missing");
        if (!/[^A-Za-z0-9]/.test(password)) errors.push("Special character missing");
        if (password.length < 8) errors.push("Minimum 8 characters required");
        return errors; // empty = strong
    }

    // ========================
    // LIVE PASSWORD STRENGTH INDICATOR
    // ========================
    if (passField && strengthIndicator) {
        passField.addEventListener("input", function () {
            const val = this.value;

            const checks = [
                {id: "eCA", regex: /[A-Z]/, label: "Uppercase letter"},
                {id: "eSA", regex: /[a-z]/, label: "Lowercase letter"},
                {id: "eD", regex: /[0-9]/, label: "Number"},
                {id: "eSC", regex: /[^A-Za-z0-9]/, label: "Special character"}
            ];

            let strength = 0;

            checks.forEach(check => {
                const el = document.getElementById(check.id);
                if (check.regex.test(val)) {
                    el.className = "valid";
                    el.innerText = `${check.label} ✓`;
                    strength++;
                } else {
                    el.className = "invalid";
                    el.innerText = `${check.label} missing`;
                }
            });

            if (val.length >= 8) strength++;

            const width = (strength / 5) * 100;
            strengthIndicator.style.width = width + "%";
            strengthIndicator.style.backgroundColor = strength <= 2 ? "red" :
                                                      strength <= 4 ? "orange" : "green";
        });
    }

    // ========================
    // FORM VALIDATION + POPUP
    // ========================
    form.addEventListener("submit", function(e) {
        e.preventDefault(); // prevent form default submission

        const fname = document.getElementById("fname").value.trim();
        const lname = document.getElementById("lname").value.trim();
        const uname = document.getElementById("uname").value.trim();
        const email = document.getElementById("email").value.trim();
        const mobile = document.getElementById("mobile").value.trim();
        const pass = passField.value;

        // Basic field validation
        if (fname.length < 3) { alert("First name must be at least 3 characters"); return; }
        if (lname.length < 3) { alert("Last name must be at least 3 characters"); return; }
        if (uname.length < 3) { alert("Username must be minimum 3 characters"); return; }

        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!emailPattern.test(email)) { alert("Enter a valid email address"); return; }

        if (mobile.length !== 11 || isNaN(mobile)) { alert("Mobile number must be 11 digits"); return; }

        // Password validation
        const errors = strongPassword(pass);
        if (errors.length > 0) {
            alert("Password error:\n• " + errors.join("\n• "));
            return;
        }

        // Show success popup
        popup.style.display = "block";
        setTimeout(() => {
            popup.style.display = "none";
            form.submit(); // finally submit the form to backend
        }, 1500);
    });
});