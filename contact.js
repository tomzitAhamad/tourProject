const form = document.getElementById('contactForm');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch('contact_process.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        let popup = document.createElement('div');
        popup.style.position = "fixed";
        popup.style.top = "50%";
        popup.style.left = "50%";
        popup.style.transform = "translate(-50%, -50%)";
        popup.style.padding = "20px 30px";
        popup.style.borderRadius = "12px";
        popup.style.fontSize = "18px";
        popup.style.textAlign = "center";
        popup.style.zIndex = "10000";
        popup.style.boxShadow = "0 4px 12px rgba(0,0,0,0.3)";

        if (data.trim() === 'success') {
            popup.innerHTML = "Your message has been saved successfully!";
            popup.style.background = "#4CAF50";
            popup.style.color = "#fff";
            form.reset();
        } else {
            popup.innerHTML = "Something went wrong. " + data;
            popup.style.background = "#e53935";
            popup.style.color = "#fff";
        }

        document.body.appendChild(popup);

        setTimeout(() => {
            popup.remove();
        }, 4000);
    })
    .catch(err => console.log(err));
});