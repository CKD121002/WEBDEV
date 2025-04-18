function showPage(pageId) {
    // Hide all forms
    document.getElementById('login-page').style.display = 'none';
    document.getElementById('Sign-Up-page').style.display = 'none';
    document.getElementById('reset-password-page').style.display = 'none';

    // Show the selected form
    document.getElementById(pageId).style.display = 'block';
}


function togglePassword(inputId, iconElement) {
    const passwordField = document.getElementById(inputId);
    if (passwordField.type === "password") {
        passwordField.type = "text";
        iconElement.classList.remove("fa-lock");
        iconElement.classList.add("fa-lock-open");
    } else {
        passwordField.type = "password";
        iconElement.classList.remove("fa-lock-open");
        iconElement.classList.add("fa-lock");
    }
}
function validateLogin() {
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();
    var errorMsg = document.getElementById("login-error");

    if (username === "" || password === "") {
        errorMsg.style.display = "block";
    } else {
        errorMsg.style.display = "none";
        alert("Logging in..."); 
    }
}

function validateSignup() {
    const name = document.getElementById("signup-name").value.trim();
    const email = document.getElementById("signup-email").value.trim();
    const password = document.getElementById("create-password").value.trim();
    const errorMsg = document.getElementById("signup-error");
    const successMessage = document.getElementById("success-message");

    if (name && email && password) {
        errorMsg.style.display = "none";
        successMessage.style.display = "block";

        setTimeout(() => {
            successMessage.classList.add("fade-out");
            setTimeout(() => {
                successMessage.style.display = "none";
                successMessage.classList.remove("fade-out");
            }, 2000);
        }, 5000);

        return false; 
    } else {
        errorMsg.style.display = "block";
        return false;
    }
}

function validateResetPassword() {
    var oldPassword = document.getElementById("reset-password").value.trim();
    var email = document.getElementById("reset-email").value.trim();
    var errorMsg = document.getElementById("reset-password-error");
    var successBox = document.getElementById("reset-success-message");

    if (oldPassword === "" || email === "") {
        errorMsg.style.display = "block";
        return false;
    } else {
        errorMsg.style.display = "none";
        successBox.style.display = "block";

        setTimeout(() => {
            successBox.classList.add("fade-out");
            setTimeout(() => {
                successBox.style.display = "none";
                successBox.classList.remove("fade-out");

                alert("You have successfully reset your password. Check your email.");
            }, 2000);
        }, 3000);

        return false;
    }
}

function setupInputListeners(inputIds, errorElementId) {
    const errorElement = document.getElementById(errorElementId);

    inputIds.forEach(id => {
        const input = document.getElementById(id);
        input.addEventListener('input', () => {
            if (input.value.trim() !== "") {
                errorElement.classList.add('fade-out');

                setTimeout(() => {
                    errorElement.style.display = "none";
                    errorElement.classList.remove('fade-out');
                }, 2000);
            }
        });
    });
}

setupInputListeners(['username', 'password'], 'login-error');
setupInputListeners(['signup-name', 'signup-email', 'create-password'], 'signup-error');
setupInputListeners(['reset-password', 'reset-email'], 'reset-password-error');
