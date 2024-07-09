<?php
    session_start();
    if (isset($_POST["formsend"])){

        echo "<script>document.addEventListener('DOMContentLoaded', function() { validateForm(); });</script>";

        extract($_POST);
        $email = htmlspecialchars($EMAIL);
        $password = htmlspecialchars($PASSWORD);
        $confirmPassword = htmlspecialchars($CONFIRMPASSWORD);

        if(!empty($email) && !empty($password) && !empty($confirmPassword)){
            if($password == $confirmPassword){
                $emailParts = explode('@', $email);
                $PSEUDO = $emailParts[0];

                $options = [
                    'cost' => 12,
                ];
                $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                include '../Include/database.php';
                global $db;

                $c = $db->prepare("SELECT email FROM users WHERE email = :EMAIL");
                $c->execute(['EMAIL' => $email]);

                $result = $c->rowCount();

                if($result == 0){

                    $q = $db->prepare("INSERT INTO users (pseudo, email, psswrd) VALUES (:PSEUDO, :EMAIL,  :PASSWORD)");
                    $q->execute([
                        'PSEUDO' => $PSEUDO,
                        'EMAIL' => $email,
                        'PASSWORD' => $hashpass
                    ]);
                    $_SESSION['create'] = 'good';
                }
                else{
                    $_SESSION['create'] = 'use email';
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SafeNet</title>
    <link rel="icon" href="../img/SafeNet_Logo_1.png" type="image/png">
    <link rel="stylesheet" href="signup.css">
</head>
<header>
    <button class="change-theme__icon" id="toggle-theme">
        <div class="icon-sun">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24">
                <path fill="#1c1c1e" d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                <path fill="#1c1c1e" d="M11 0H13V4.06189C12.6724 4.02104 12.3387 4 12 4C11.6613 4 11.3276 4.02104 11 4.06189V0ZM7.0943 5.68018L4.22173 2.80761L2.80752 4.22183L5.6801 7.09441C6.09071 6.56618 6.56608 6.0908 7.0943 5.68018ZM4.06189 11H0V13H4.06189C4.02104 12.6724 4 12.3387 4 12C4 11.6613 4.02104 11.3276 4.06189 11ZM5.6801 16.9056L2.80751 19.7782L4.22173 21.1924L7.0943 18.3198C6.56608 17.9092 6.09071 17.4338 5.6801 16.9056ZM11 19.9381V24H13V19.9381C12.6724 19.979 12.3387 20 12 20C11.6613 20 11.3276 19.979 11 19.9381ZM16.9056 18.3199L19.7781 21.1924L21.1923 19.7782L18.3198 16.9057C17.9092 17.4339 17.4338 17.9093 16.9056 18.3199ZM19.9381 13H24V11H19.9381C19.979 11.3276 20 11.6613 20 12C20 12.3387 19.979 12.6724 19.9381 13ZM18.3198 7.0943L21.1923 4.22183L19.7781 2.80762L16.9056 5.6801C17.4338 6.09071 17.9092 6.56608 18.3198 7.0943Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </div>
        <div class="icon-moon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" width="24">
                <path fill="#f2f2f7" d="M12.2256 2.00253C9.59172 1.94346 6.93894 2.9189 4.92893 4.92891C1.02369 8.83415 1.02369 15.1658 4.92893 19.071C8.83418 22.9763 15.1658 22.9763 19.0711 19.071C21.0811 17.061 22.0565 14.4082 21.9975 11.7743C21.9796 10.9772 21.8669 10.1818 21.6595 9.40643C21.0933 9.9488 20.5078 10.4276 19.9163 10.8425C18.5649 11.7906 17.1826 12.4053 15.9301 12.6837C14.0241 13.1072 12.7156 12.7156 12 12C11.2844 11.2844 10.8928 9.97588 11.3163 8.0699C11.5947 6.81738 12.2094 5.43511 13.1575 4.08368C13.5724 3.49221 14.0512 2.90664 14.5935 2.34046C13.8182 2.13305 13.0228 2.02041 12.2256 2.00253ZM17.6569 17.6568C18.9081 16.4056 19.6582 14.8431 19.9072 13.2186C16.3611 15.2643 12.638 15.4664 10.5858 13.4142C8.53361 11.362 8.73568 7.63895 10.7814 4.09281C9.1569 4.34184 7.59434 5.09193 6.34315 6.34313C3.21895 9.46732 3.21895 14.5326 6.34315 17.6568C9.46734 20.781 14.5327 20.781 17.6569 17.6568Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </div>
    </button>

    <?php
        if (isset($_SESSION['create'])){
            if ($_SESSION['create'] == "good"){
                echo '<div class="alert_information_green">
                <div class="error__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                </div>
                <div class="error__title">Votre compte a été créé</div>
                </div>';
            }
            else if ($_SESSION['create'] == "use email"){
                echo '<div class="alert_information_red">
                <div class="error__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                </div>
                <div class="error__title">Cette email est deja utilisé</div>
                </div>';
            }
            else{
                echo '<div class="alert_information_red">
                <div class="error__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                </div>
                <div class="error__title">Erreur</div>
                </div>';
            }
        }
    ?>
    <button class="animated-button" onclick="login_button()">
        <span>Login</span>
        <span></span>
    </button>
</header>
<body>
    <form class="form" method="post" name="registerForm" onsubmit="return validateForm()">
        <div class="flex-column">
            <label>Email </label>
        </div>
        <span id="emailError" class="error"></span>
        <div class="inputForm" name="email">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input type="text" name="EMAIL" class="input" placeholder="Enter your Email">
        </div>
        <div class="flex-column">
            <label>Password </label>
        </div>
        <span id="passwordError" class="error"></span>
        <div class="inputForm" name="password">
            <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>
            <input type="password" id="password-field" name="PASSWORD" class="input" placeholder="Enter your Password">
            <label class="container" name="eye-password">
                <input type="checkbox" checked="checked" onclick="togglePasswordVisibility()">
                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
            </label>
        </div>
        <span id="forcedPassword" class="verification"></span>
        <div class="flex-column">
            <label>Confirm Password </label>
        </div>
        <span id="confirmPasswordError" class="error"></span>
        <div class="inputForm" name="confirmPassword" name="confirmPassword">
            <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>
            <input type="password" id="confirm-password-field" name="CONFIRMPASSWORD" class="input" placeholder="Confirm your Password">

            <label class="container" name="eye-confirm">
                <input type="checkbox" checked="checked" onclick="toggleConfirmPasswordVisibility()">
                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
            </label>
        </div>
        <div class="flex-row">
            <div>
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember me </label>
            </div>
        </div>
        <input type='submit' class="button-submit" name="formsend" >
    </form>



</body>
<footer>
    <div class="footer-content">
        <div class="legal">
            <a href="mentions_legales.html">Mentions légales</a>
        </div>
        <div class="copyright">
            &copy; 2024 SafeNet. All rights reserved.
        </div>
    </div>
    <script>
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
            window.location.href = "test_loginpage.php";
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
    </script>
</footer>
</html>