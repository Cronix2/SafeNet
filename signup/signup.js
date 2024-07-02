document.getElementById('toggle-theme').addEventListener('click', function() {
    document.body.classList.toggle('dark');
});

document.querySelector('.change-theme__icon').addEventListener('click', function() {
    this.classList.toggle('active');
});



function togglePasswordVisibility() {
        var passwordField = document.getElementById('password-field');
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    function toggleConfirmPasswordVisibility() {
        var passwordField = document.getElementById('confirm-password-field');
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    

// changement de page
function login_button() {
    window.location.href = "../login/login.php";
}


// Fonction de validation du formulaire
function validateForm() {
    // Récupérer les valeurs des champs email, password et confirmPassword
    var email = document.querySelector('input[name="EMAIL"]').value;
    var password = document.querySelector('input[name="PASSWORD"]').value;
    var confirmPassword = document.querySelector('input[name="CONFIRMPASSWORD"]').value;
    var regexemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var formemail = /^[a-zA-Z0-9._-]+@(esiea|et.esiea)\.fr$/;
    var upperCase = new RegExp('[A-Z]');
    var lowerCase = new RegExp('[a-z]');
    var numbers = new RegExp('[0-9]');
    var specialchars = new RegExp('([!,%,&,@,#,$,^,*,?,_,~])');

    // Initialiser les messages d'erreur à vide
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('confirmPasswordError').textContent = '';

    // Retirer la classe error des champs email, password et confirmPassword
    document.querySelector('input[name="EMAIL"]').parentElement.classList.remove('error');
    document.querySelector('input[name="PASSWORD"]').parentElement.classList.remove('error');
    document.querySelector('input[name="CONFIRMPASSWORD"]').parentElement.classList.remove('error');


    // Initialiser les variables de validation à true
    var emailValid = true;
    var passwordValid = true;
    var confirmPasswordValid = true;

    // Valider l'email
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email is required';
        document.querySelector('input[name="EMAIL"]').parentElement.classList.add('error');
        emailValid = false;
    }
    else if (!regexemail.test(email)) {
        document.getElementById('emailError').textContent = 'Email is invalid';
        document.querySelector('input[name="EMAIL"]').parentElement.classList.add('error');
        emailValid = false;
    }

    if (!formemail.test(email)) {
        document.getElementById('emailError').textContent = 'Email must be an esiea email';
        document.querySelector('input[name="EMAIL"]').parentElement.classList.add('error');
        emailValid = false;
    }

    // Valider le mot de passe
    if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is required';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }

    //Valider que le mot de passe est assez fort
    if (password.length < 8) {
        document.getElementById('passwordError').textContent = 'Password must be at least 8 characters';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }
    if (!upperCase.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }
    if (!lowerCase.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one lowercase letter';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }
    if (!numbers.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one number';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }
    if (!specialchars.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one special character';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }

    // Valider la confirmation du mot de passe
    if (confirmPassword === '') {
        document.getElementById('confirmPasswordError').textContent = 'Confirm Password is required';
        document.querySelector('input[name="CONFIRMPASSWORD"]').parentElement.classList.add('error');
        confirmPasswordValid = false;
    } else if (confirmPassword !== password) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
        document.querySelector('input[name="CONFIRMPASSWORD"]').parentElement.classList.add('error');
        confirmPasswordValid = false;
    }

    // Retourner true si tous les champs sont valides, sinon false
    return emailValid && passwordValid && confirmPasswordValid;
}