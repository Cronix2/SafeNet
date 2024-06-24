<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SafeNet</title>
    <link rel="icon" href="../img/SafeNet_Logo_1.png" type="image/png">
    <style>
        :root {
            --light-background: #fefdf9;
            --light-text: #000000;
            --dark-background: #3b3b3bd3;
            --dark-text: #ffffff;
            --light-card-background: #f0f0f0; 
            --dark-card-background: #3f3f3f66;
            --light-nav-background: #f0f0f0;
            --dark-nav-background: #4a4a4a;
            --light-login-color: #1a1a1a5e; /* Couleur de bordure pour le thème clair */
            --dark-login-color: #ffffff66; /* Couleur de bordure pour le thème sombre */
        }

        body {
            background-color: var(--light-background);
            color: var(--light-text);
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            --text-color: var(--light-text);
            --card-background: var(--light-card-background);
            --border-color: var(--dark-card-background);
            --nav-background: var(--light-nav-background);
            --login-color: var(--light-login-color);
        }

        body.dark {
            background-color: var(--dark-background);
            color: var(--dark-text); 
            --text-color: var(--dark-text);
            --card-background: var(--dark-card-background);
            --border-color: var(--light-card-background);
            --nav-background: var(--dark-nav-background);
            --login-color: var(--dark-login-color);
        }

        #toggle-theme {
            position: absolute;
            top: 2%;
            left: 1%;
        }
            
        button {
            border: none;
            background: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            font-family: inherit;
        }
        /* <style for change-theme__icon> ======== */
        .change-theme__icon {
            width: 32px;
            height: 32px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .icon-sun,
        .icon-moon {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            margin-left: auto;
        }

        /* .icon-sun */
        .icon-sun {
            animation: ease reverse-change-theme-sun .6s forwards;
        }

        .change-theme__icon.active .icon-sun {
            animation: ease change-theme-sun .4s forwards;
        }

        @keyframes reverse-change-theme-sun {
            0% {transform: rotate(-45deg) scale(.8);
                opacity: 0;}

            50% {transform: rotate(8deg);}

            100% {transform: rotate(0deg) scale(1);
                opacity: 1;}}

        @keyframes change-theme-sun {
            0% {transform: rotate(0deg) scale(1);
                opacity: 1;}

            100% {transform: rotate(-45deg) scale(.8);
                opacity: 0;}}

        /* .icon-moon */
        .icon-moon {
        animation: ease reverse-change-theme-moon .4s forwards;
        }

        .change-theme__icon.active .icon-moon {
        animation: change-theme-moon .6s forwards;
        }

        @keyframes change-theme-moon {
        0% {transform: rotate(-45deg) scale(.8);
            opacity: 0;}
        50% {transform: rotate(8deg);}
        100% {transform: rotate(0deg) scale(1);
            opacity: 1;}}

        @keyframes reverse-change-theme-moon {
        0% {transform: rotate(0deg) scale(1);
            opacity: 1;}

        100% {transform: rotate(-45deg) scale(.8);
            opacity: 0;}}



        form {
            width: 50%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        footer {
            margin-top: auto;
            width: 100%;
            background-color: #1e1f21;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            justify-content: center;
        }
        
        .footer-content .legal a {
            margin-right: 15px;
            color: #ebebeb;
            text-decoration: none;
        }

        .footer-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .footer-content .copyright {
            margin-top: 10px;
            color: #b5bbc1;
        }

        ::placeholder {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .form button {
            align-self: flex-end;
        }

        .flex-column > label {
            color: #151717;
            font-weight: 600;
        }

        .inputForm:focus-within {
            border: 1.5px solid #2d79f3;
        }

        .flex-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            justify-content: space-between;
        }

        .flex-row > div > label {
            font-size: 14px;
            color: black;
            font-weight: 400;
        }

        .btn {
            margin-top: 10px;
            width: 100%;
            height: 50px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 500;
            gap: 10px;
            border: 1px solid #ededef;
            background-color: white;
            cursor: pointer;
            transition: 0.2s ease-in-out;
        }

        .btn:hover {
            border: 1px solid #2d79f3;
        }

        /*------ Settings ------*/
        .container {
        --color: #85858f;
        --size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        font-size: var(--size);
        user-select: none;
        fill: var(--color);
        }

        .container .eye {
        position: absolute;
        animation: keyframes-fill .5s;
        }

        .container .eye-slash {
        position: absolute;
        animation: keyframes-fill .5s;
        display: none;
        }

        /* ------ On check event ------ */
        .container input:checked ~ .eye {
        display: none;
        }

        .container input:checked ~ .eye-slash {
        display: block;
        }

        /* ------ Hide the default checkbox ------ */
        .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
        }

        /* ------ Animation ------ */
        @keyframes keyframes-fill {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        50% {
            transform: scale(1.2);
        }
        }

        .animated-button {
        position: absolute;
        top : 2%;
        right: 1%;
        display: inline-block;
        padding: 12px 24px;
        border: none;
        font-size: 16px;
        background-color: inherit;
        border-radius: 100px;
        font-weight: 600;
        color: var(--login-color);
        box-shadow: 0 0 0 2px var(--login-color);
        /*  
        color: #ffffff40;
        box-shadow: 0 0 0 2px #ffffff20;
        */
        cursor: pointer;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .animated-button span:last-child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background-color: #2196F3;
        border-radius: 50%;
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .animated-button span:first-child {
        position: relative;
        z-index: 1;
        }

        .animated-button:hover {
        box-shadow: 0 0 0 5px #2195f360;
        color: #ffffff;
        }

        .animated-button:active {
        scale: 0.95;
        }

        .animated-button:hover span:last-child {
        width: 150px;
        height: 150px;
        opacity: 1;
        }

        .otp-field {
            flex-direction: row;
            column-gap: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form input::-webkit-inner-spin-button,
        .form input::-webkit-outer-spin-button {
            display: none;
        }

        .resend {
            font-size: 12px;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: black;
            font-size: 12px;
            text-align: right;
            font-family: monospace;
        }

        .footer a {
            color: black;
            text-decoration: none;
        }
        .rectangle {
            color: black;
            margin-top: auto;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .button-submit {
            margin-top: 20px;
            justify-content: center;
            align-items: center;
            background-color: #32d929;
            border: none;
            color: white;
            font-size: 15px;
            font-weight: 500;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            height: 50px;
            width: 68%;
            cursor: pointer;
        }

        .button-submit:hover {
            background-color: #2ccf24;
            
        }

        .button-submit:active {
            background-color: #000000;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form {
            margin-top: 5px
        }

        .form input {
            width: 32px;
            height: 32px;
            text-align: center;
            border: none;
            border-bottom: 2px solid #d2d2d2;
            margin: 0 10px;
        }

        .form input:focus {
            border-bottom: 2px solid royalblue;
            outline: none;
        }

        mark {
            background: none;
            color: black;
            font-weight: bold;
            margin-bottom: 20px;
        }

    </style>
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
    <button class="animated-button" onclick="signup_button()">
        <span>Sign up</span>
        <span></span>
    </button>
</header>
<body class="container-fluid bg-body-tertiary d-block">
    <div name="rectangle" class="rectangle">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4" style="min-width: 500px;">
                <div class="card bg-white mb-5 mt-5 border-0">
                    <div class="card-body">
                        <img src="../img/mail.gif" width="90" alt="Mail Image">
                        <h4>Verify</h4>
                        <p>Enter the 6-digit security code we sent to </p>
                        <mark>li*********t@esiea.fr</mark>
                        <div class="form">
                            <input type="number" />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                            <input type="number" disabled />
                        </div>
                        <button class="button-submit">
                            Verify
                        </button>
                        <p class="resend text-muted mb-0">
                            Didn't receive code ? <a href="">Request again</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('keypress', function(event) {
                var forbiddenCharacters = ['-', 'E', '+', 'e', '.'];
                if (forbiddenCharacters.includes(event.key)) {
                    event.preventDefault();
                }
            });
        });

        // Sélectionnez tous les champs de saisie
        var inputs = document.querySelectorAll('input');

        // Parcourez chaque champ de saisie
        inputs.forEach(function(input, index) {
            // Ajoutez un écouteur d'événements 'input'
            input.addEventListener('input', function() {
                // Si le champ est rempli
                if (this.value) {
                    // Si ce n'est pas le dernier champ
                    if (index < inputs.length - 1) {
                        // Activez le champ suivant
                        inputs[index + 1].disabled = false;
                        // Placez le curseur dans le champ suivant
                        inputs[index + 1].focus();
                    }
                }
            });
        });

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                if (input.value.length > 1) {
                    input.value = input.value.slice(-1);
                }
            });
        });

        inputs.forEach(function(input, index) {
            input.addEventListener('keydown', function(event) {
                // Si la touche 'Backspace' est pressée et que le champ est vide
                if (event.key === 'Backspace' && this.value === '') {
                    // Désactivez le champ actuel et tous ceux à sa droite
                    for (let i = index; i < inputs.length; i++) {
                        if (index > 0) {
                            inputs[i].disabled = true;
                        }
                    }
                    // Si ce n'est pas le premier champ
                    if (index > 0) {
                        // Déplacez le focus sur le champ précédent
                        inputs[index - 1].focus();
                    }
                }
            });
        });

    </script>
</footer>
</html>
