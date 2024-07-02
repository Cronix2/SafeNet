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


    
// Fonction de validation du formulaire
function validateForm() {
    // Récupérer les valeurs des champs email, password et confirmPassword
    var email = document.querySelector('input[name="EMAIL"]').value;
    var password = document.querySelector('input[name="PASSWORD"]').value;
    var regexemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var upperCase = new RegExp('[A-Z]');
    var lowerCase = new RegExp('[a-z]');
    var numbers = new RegExp('[0-9]');
    var specialchars = new RegExp('([!,%,&,@,#,$,^,*,?,_,~])');

    // Initialiser les messages d'_SESSIONur à vide
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Retirer la classe error des champs email, password et confirmPassword
    document.querySelector('input[name="EMAIL"]').parentElement.classList.remove('error');
    document.querySelector('input[name="PASSWORD"]').parentElement.classList.remove('error');


    // Initialiser les variables de validation à true
    var emailValid = true;
    var passwordValid = true;

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
    // Valider le mot de passe
    if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is required';
        document.querySelector('input[name="PASSWORD"]').parentElement.classList.add('error');
        passwordValid = false;
    }

    // Retourner true si tous les champs sont valides, sinon false
    return emailValid && passwordValid;
}



function signup_button() {
    window.location.href = "../signup/signup.php";
}
