<?php
session_start();
include '../Include/database.php';
if (!isset($_SESSION['pseudo'])){
    header('Location: ../../index.php');
    exit();
}
if ($_SESSION['theme'] == 'light'){
    $button_theme = 'disactive';
    $logo = '../img/SafeNet_Logo_2_dark.png';
} else {
    $button_theme =  'active';
    $logo = '../img/SafeNet_Logo_2_light.png';
}

if (!isset($_SESSION['cours1'])){
    header('Location: Demo_1.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>SafeNet</title>
    <link rel="icon" href="../img/SafeNet_Logo_1.png" type="image/png">
<style>
    body {
    font-family: sans-serif;
    background-color: #222;
    color: #eee;
    }

    .task {
        width: 90%;
        margin: 0 auto;
        background-color: #333;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .task-icon {
    margin-right: 10px;
    }

    .task-title {
    font-weight: bold;
    }

    .task-arrow {
    margin-left: auto;
    }

    .content {
    padding: 20px;
    }

    .content-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    }

    .content-text {
    line-height: 1.5;
    }
    :root {
            --light-background: #fefdf9;
            --light-text: #000000;
            --dark-background: #191c3a;
            --dark-text: #ffffff;
            --light-card-background: #f0f0f0; 
            --dark-card-background: #151623;
            --light-nav-background: #f0f0f0;
            --dark-nav-background: #1D2033;
            --task-color_1: rgb(8, 241, 8);
            --task-color_2: red;
        }

        body {
            /*background-image: url('pexels-photo-1072179.jpeg');*/
            background-color: var(--light-background);
            /*background-repeat: no-repeat;
            background-size: cover;*/
            color: var(--light-text);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            --text-color: var(--light-text);
            --card-background: var(--light-card-background);
            --border-color: var(--dark-card-background);
            --nav-background: var(--light-nav-background);

        }

        body.dark {
            background-color: var(--dark-background);
            color: var(--dark-text); 
            --text-color: var(--dark-text);
            --card-background: var(--dark-card-background);
            --border-color: var(--light-card-background);
            --nav-background: var(--dark-nav-background);
        }


        #sticky-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
            display: flex;
        }

        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .navbar {
            margin-top: 0;
            top: 0;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: var(--nav-background);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: var(--dark-text);
            text-decoration: none;
        }

        .pseudo {
            margin-right: 10px;
            font-size: 18px;
            font-family: Arial;
            font-weight: bold;
            color: var(--text-color);
            text-decoration: none;
            display: flex;
            justify-content: flex-end;
            margin-left: auto;
        }

        
        .avatar {
            width: 50px; /* Ajustez cette valeur pour changer la taille */
            height: 50px; /* Assurez-vous que la hauteur est la même que la largeur pour un cercle parfait */
            border-radius: 50%; /* Pour rendre l'image ronde */
            border: 3px solid var(--border-color); /* Ajoute une bordure */
            
        }



        #courses {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        @media (max-width: 600px) {
            .card {
                flex: 0 0 100%;
            }
        }

        @media (min-width: 600px) and (max-width: 900px) {
            .card {
                flex: 0 0 50%;
            }
        }

        @media (min-width: 900px) {
            .card {
                flex: 0 0 33%;
            }
        }

        .card {
            background-color: var(--card-background);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            border-radius: 5px;
            flex: 0 0 30%;
            margin: 1%;
            margin-left: 2%;
            border-radius: 30px;
            border: 2px solid black;
            font-family: Arial, sans-serif;
            transition: border-color 0.3s ease;
        }

        body.dark .card {
            border-color: white;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
        }

        .card-body {
            padding: 20px;
        }

        .container {
            padding: 2px 16px;
            display: flex;
            justify-content: flex-end;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-text {
            font-size: 16px;
            color: var(--text-color);
        }

        .btn-primary {
            display: block;
            background-color: #32d929;
            border-color: #32d929;
            color: #fff;
            text-align: center;
            border-radius: 0;
            padding: 10px 20px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: #2ccf24;
            color: white;
        }
        .btn-primary:active {
            background-color: #000000;
            color: white;
        }
        
        /* <reset-style> ============================ */
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

        .search {
            display: inline-block;
            width: auto;
            position: relative;
            justify-content: flex-end;
            align-items: center;
            margin-left: auto;
        }

        .search input[type="text"] {
            width: 200px;
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search button[type="submit"] {
            background-color: #4e99e9;
            border: none;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 0;
            right: 0;
            transition: .9s ease;
        }

        .search button[type="submit"]:hover {
            transform: scale(1.1);
            color: rgb(255, 255, 255);
            background-color: blue;
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

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .task {
            margin: 5px;
            display: block;
            height: auto;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: var(--background-color); /* Ajout de cette ligne */

        }

        .task-header {
            border-left: 5px solid var(--task-color_2);
            border-top-left-radius: 10px; /* Ajustez la valeur selon vos préférences */
            border-top-right-radius: 10px; /* Ajustez la valeur selon vos préférences */
            width: 100%;
            background-color: #303030; /* Gris anthracite */
            display: flex;
            align-items: center;
            padding: 10px;
            color: #fff; /* Texte blanc */
        }

        .task .task-header {
            border-radius: 10px; /* Ajustez la valeur selon vos préférences */
        }


        .task.open .task-header {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .open .task-content {
            line-height: 1.5;
            border-bottom-left-radius: 10px; /* Ajustez la valeur selon vos préférences */
            border-bottom-right-radius: 10px; /* Ajustez la valeur selon vos préférences */
        }

        .task-header .task-number {
            margin-right: 10px;
            color: var(--task-color_2);
        }

        .task-header .task-name {
            flex-grow: 1;
            margin-left: 10px;
        }

        .task-header .task-dot{
            margin:auto;
        }


        .task-header .task-arrow {
            margin-left: auto;
            cursor: pointer;
        }
        
        .task-content {
            display: none;
            background-color: #f9f9f9; /* Fond blanc */
            border-left: 5px solid var(--task-color_2); /* Bordure rouge à gauche */
            padding: 10px;
            clear: both; /* Assure que le contenu de la tâche s'affiche sous l'en-tête de la tâche */
            width: 100%; /* Ajout de cette ligne */
            color: #000000;
        }

        .task-header h3 {
            margin-bottom: 5px;
        }

        .task-header p {
            display: none;
        }

        .task.expanded .task-header p {
            display: block;
        }
        

        .social-buttons {
            margin-bottom: 10px;
            margin-top: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--card-background);
            box-shadow: 0px 0px 15px #00000027;
            padding: 15px 10px;
            border-radius: 5em;
        }

        .social-button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 0 10px;
            background-color: #fff;
            box-shadow: 0px 0px 4px #00000027;
            transition: 0.3s;
        }

        .social-button:hover {
            background-color: #f2f2f2;
            box-shadow: 0px 0px 6px 3px #00000027;
        }

        .social-buttons svg {
            transition: 0.3s;
            height: 20px;
        }

        .facebook {
            background-color: #3b5998;
        }

        .facebook svg {
            fill: #f2f2f2;
        }

        .facebook:hover svg {
            fill: #3b5998;
        }

        .github {
            background-color: #333;
        }

        .github svg {
            width: 25px;
            height: 25px;
            fill: #f2f2f2;
        }

        .github:hover svg {
            fill: #333;
        }


        .menu {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }


        .task-header h3 {
            margin-bottom: 5px;
        }

        .task-header p {
            display: none;
        }

        .task.expanded.task-header p {
            display: block;
        }

        .linkedin {
            background-color: #0077b5;
        }

        .linkedin svg {
            fill: #f2f2f2;
        }

        .linkedin:hover svg {
            fill: #0077b5;
        }

        .instagram {
            background-color: #c13584;
        }

        .instagram svg {
            fill: #f2f2f2;
        }

        .instagram:hover svg {
            fill: #c13584;
        }

        svg {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        svg circle {
            margin: auto;

        }

        button.read-and-understood {
            background-color: white;
            border: 2px solid rgb(3, 196, 3);
            color: black;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            text-align: center;
        }

        .read-and-understood:hover {
            background-color: rgb(0, 255, 0);
            border: 2px solid rgb(0, 255, 0);
            transition: background-color 0.3s ease;
        }

        .read-and-understood.clicked {
            background-color: rgb(3, 196, 3);
            color: white;
        }

        .responseFormat {
            background-color: white;
            border-radius: 5px;
            border: 1px solid #a2a2a2;
        }

        .question {
            margin: 10px;
            display: flex;
        }

        .question input,
        .question button {
            height: auto;
            margin-left: 5px;
        }

        button.clicked {
            background-color: rgb(3, 196, 3);
            color: white;
        }

        input.glow-red {
            box-shadow: 0 0 10px red;
        }

        input.glow-green {
            border: 2px solid rgb(3, 196, 3);
            background-color: #e3e3e3;
            color: rgb(103, 103, 103);
            pointer-events: none;
        }

        
        button.need-response {
            background-color: white;
            border: 2px solid rgb(3, 196, 3);
            color: black;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            text-align: center;
        }

        .need-response:hover {
            background-color: rgb(0, 255, 0);
            border: 2px solid rgb(0, 255, 0);
            transition: background-color 0.3s ease;
        }

        .need-response.clicked {
            background-color: rgb(3, 196, 3);
            color: white;
            pointer-events: none;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100rem;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .popup-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Ubuntu, sans-serif;
            font-weight: bold;
            color: #000000;
            background-color: #fefefe;
            margin: 15% auto auto auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            border-radius: 20px;
            position: relative;
        }

        .exercice {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            overflow: auto;
        }

        .exercice-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Ubuntu, sans-serif;
            font-weight: bold;
            color: #000000;
            background-color: #fefefe;
            margin: 20px auto 20px auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            border-radius: 20px;
            position: relative;
        }

        .titre_exo {
            display: flex;
            flex-direction: column;
            font-family: Ubuntu, sans-serif;
            font-weight: bold;
            color: #ffffff;
            background-color: #191c3a;
            margin: auto;
            padding: auto;
            width: 80%;
            border-left: 5px solid red;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            position: relative;
        }

        .texte_exo {
            display: flex;
            flex-direction: column;
            font-family: Ubuntu, sans-serif;
            font-weight: bold;
            color: #000000;
            background-color: #ebebeb;
            margin: auto;
            padding: auto;
            width: 80%;
            border-left: 5px solid red;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            position: relative;
        }

        .finish {
            border-left: 5px solid rgb(8, 241, 8);
        }

        .close-btn {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .numero_exo {
            position: relative;
            height: 50px; /* Ajustez la hauteur si nécessaire */
        }

        .numero_exo .round {
            width: 10px; /* Taille du rond */
            height: 10px; /* Taille du rond */
            border-radius: 50%; /* Rend le div rond */
            background-color: grey; /* Couleur du rond */
            position: absolute;
            bottom: 10px; /* Position en bas du div */
            right: 10px; /* Position à droite du div */
        }

        .attack{
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }

        .attack:hover{
            background-color: darkgreen;
        }
        
        .exo1-content {
            display: flex;
            align-items: center; /* Pour aligner verticalement les éléments au centre */
            position: relative;
            justify-content: space-around; /* Pour répartir l'espace autour des éléments */
        }

        .table {
            height: 50%;
            width: 50%;
        }

        .request {
            /* border: 2px solid #000000; */
            border-collapse: collapse;
            width: 100%;
        }

        .request th:nth-child(even) {
            background-color: #f2f2f2;
        }

        .head_table {
            background-color: #000000;
            color: #ffffff;
            border: 2px solid #000000;
            margin: 10%;
            justify-content: center;
        }

        .pair {
            background-color: #d5d5d5;
            border: 2px solid #000000;
        }

        .impair {
            background-color: #f2f2f2;
            border: 2px solid #000000;
        }


        .image-container {
            position: relative;
            display: inline-block;
        }

        .desktop-image {
            bottom: 0; /* Colle l'image au bas de l'image-container */

        }

        .green-dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: green;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        .text_table{
            padding: 1px 10px 1px 10px;
            min-height: 20px;
            min-width: 120px;
            justify-content: center;

            display: flex;
        }

        
        .change_exo{
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            margin-bottom: 10px;
        }

        .change_exo:hover{
            background-color: darkgreen;
        }

    </style>
</head>
<header id="sticky-header">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">            
            <div class="nav">
                <a class="navbar-brand" href="../Include/index.php">
                    <img src="<?= $logo?>" alt="Logo" width="150" class="d-inline-block-align-text-top">
                </a>
                <button class="change-theme__icon <?= $button_theme?>" id="toggle-theme">
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
                <a class="pseudo"><?= $_SESSION['pseudo']; ?></a>
                <img src="../img/pexels-photo-1072179.jpeg" alt="Avatar" class="avatar">
            </div>
        </div>
    </nav>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <img src="../img/award.png" alt="Award" style="width: 100px; height: 100px;">
            <h2>Bravo</h2>
            <p>Vous avez compris le fonctionnement d'une attaque DoS. Maintenant passons a quelque chose de plus compliqué.</p>
            <p>Cliquez sur le bouton pour passer à l'exercice suivant</p>
            <button class="change_exo" id="changer_d'exo_popup">Passez à l'exercice 2</button>
        </div>
    </div>
</header>
<body class = "<?= $_SESSION['theme']?>">
    <div class="exercice">
        <div class="exercice-content">
            <div class="explications">
                <div class="titre_exo">
                    <h5 style="margin-left: 10px">Exercice 1</h5>
                </div>
                <div class="texte_exo">
                    <p style="margin-left: 10px;">Bien, désormais mettons en pratique ce que vous avez appris. Ci-dessous vous avez d'un coté votre machine, et de l'autre le serveur cible.</p>
                    <p style="margin-left: 10px;">Ce serveur est assez lent et assez faible, nous allons donc profiter de cela pour le surcharger. On sait qu'il traite une requète en 1 seconde, notre but sera donc de le surcharger.</p>
                    <p style="margin-left: 10px;">Pour cette exercice nous utiliserons notre machine à nous, nous alons donc procéder à une attaque DoS. Cliquer sur le boutton et essayer de faire surcharger le serveur.</p>
                    <div class="numero_exo">
                        <div class="round"></div>
                    </div>
                </div>
            </div>
            <div class="exo1">
                <div class="exo1-content">
                    <div class="image-container" id="desktop-container">
                        <img class="desktop-image" src="../img/module/module-1/exo_1_desktop.png" alt="Desktop">
                    </div>
                    <div class="image-container" id="server-container">
                        <img id="serverImage" src="../img/module/module-1/exo_1_server.png" alt="Server">
                    </div>
                    <div class="table">
                        <table class="request">
                            <tr class="head_table">
                                <td id="header_table" class="text_table">Requetes</td>
                            </tr>
                            <tr class="pair">
                                <td id="ligne2" class="text_table"></td>
                            </tr>
                            <tr class="impair">
                                <td id="ligne3" class="text_table"></td>
                            </tr>
                            <tr class="pair">
                                <td id="ligne4" class="text_table"></td>
                            </tr>
                            <tr class="impair">
                                <td id="ligne5" class="text_table"></td>
                            </tr>
                            <tr class="pair">
                                <td id="ligne6" class="text_table"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="attack" id="moveGreenDot">Envoyer une requete</button>
            </div>
        </div>
    </div>
    <button class="change_exo" id="changer_d'exo" style="display: none;">Passez à l'exercice 2</button>
    <script>

        document.getElementById('moveGreenDot').addEventListener('click', function() {
            const greenDot = document.createElement('div');
            greenDot.classList.add('green-dot');
            const greenDotWidth = 10;
            const greenDotHeight = 10;

            // Obtenir le conteneur Desktop
            const desktopContainer = document.getElementById('desktop-container');
            const desktopRect = desktopContainer.getBoundingClientRect();

            // Calculer le centre du conteneur Desktop
            const centerXDesktop =  desktopRect.width / 2 ;
            const centerYDesktop = desktopRect.height / 2;

            // Positionner le rond vert au centre du Desktop
            greenDot.style.position = 'absolute';
            greenDot.style.left = `${centerXDesktop}px`; // 5 est la moitié de la largeur du rond vert pour le centrer
            greenDot.style.top = `${centerYDesktop}px`; // 5 est la moitié de la hauteur du rond vert pour le centrer

            desktopContainer.appendChild(greenDot);

            const serverContainer = document.getElementById('server-container');
            const serverRect = serverContainer.getBoundingClientRect();

            // Calculer le centre du conteneur Server
            const centerXServer = serverRect.width * 2;
            const centerYServer = serverRect.height / 2;


            // Déplacer le rond vert du centre du Desktop au centre du Server
            greenDot.animate([
                { transform: `translate(0px, 0px)` },
                { transform: `translate(${centerXServer - centerXDesktop}px, ${centerYServer - centerYDesktop}px)` }
            ], {
                duration: 1000,
                fill: 'forwards'
            }).onfinish = function() {
                greenDot.remove();
                var lignesVides = document.querySelectorAll('.text_table:empty');
                if (lignesVides.length > 0) {
                    lignesVides[0].textContent = 'paquet n°' + Math.floor(Math.random() * 90000 + 10000);
                }
                else{
                    const sendButton = document.getElementById('moveGreenDot');
                    const serverImage = document.getElementById('serverImage');
                    serverImage.src = '../img/module/module-1/exo_1_server_fire.png';
                    const lignes = document.querySelectorAll('.text_table');
                    for (let i = 1; i < lignes.length; i++) {
                        lignes[i].textContent = 'serveur surchargé'; 
                    }
                    clearInterval(intervalId);
                    sendButton.disabled = true;
                    const popup = document.getElementById('popup');
                    popup.style.display = 'block';
                    var changerExoBtn = document.getElementById("changer_d'exo");
                    changerExoBtn.style.display = 'flex';
                    document.querySelector('.texte_exo').classList.add('finish');
                    document.querySelector('.titre_exo').classList.add('finish');
                }
            };
        });

        var intervalId = setInterval(() => {
            const lignes = document.querySelectorAll('.text_table');
            for (let i = 2; i < lignes.length; i++) {
                lignes[i - 1].textContent = lignes[i].textContent; 
            }
            lignes[lignes.length - 1].textContent = ''; 
        }, 1000);         

        document.getElementById('changer_d\'exo').addEventListener('click', function() {
            window.location.href = 'exo_2.php';
        });

        document.getElementById('changer_d\'exo_popup').addEventListener('click', function() {
            window.location.href = 'exo_2.php';
        });

        document.getElementById('toggle-theme').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../Include/update_theme.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status == 200) {
                    var newTheme = this.responseText;
                    document.body.classList.remove('light', 'dark');
                    document.body.classList.add(newTheme);

                    var logo = document.querySelector('img[alt="Logo"]');
                    if (newTheme === 'dark') {
                        logo.src = "../img/SafeNet_Logo_2_light.png";
                    } else {
                        logo.src = "../img/SafeNet_Logo_2_dark.png";
                    }
                }
            };
            xhr.send('toggle=true'); 
        });

        var popup = document.getElementById("popup");
        var closeBtn = document.getElementsByClassName("close-btn")[0];
        closeBtn.onclick = function() {
            popup.style.display = "none";
        }
        
        document.querySelector('.change-theme__icon').addEventListener('click', function() {
            this.classList.toggle('active');
        });
    </script>
</body>
<footer>
    <div class="footer-content">
        <div class="social-buttons">
            <a href="https://github.com/Cronix2/SafeNet" class="social-button github">
                <svg class="cf-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="-2.5 0 19 19"><path d="M9.464 17.178a4.506 4.506 0 0 1-2.013.317 4.29 4.29 0 0 1-2.007-.317.746.746 0 0 1-.277-.587c0-.22-.008-.798-.012-1.567-2.564.557-3.105-1.236-3.105-1.236a2.44 2.44 0 0 0-1.024-1.348c-.836-.572.063-.56.063-.56a1.937 1.937 0 0 1 1.412.95 1.962 1.962 0 0 0 2.682.765 1.971 1.971 0 0 1 .586-1.233c-2.046-.232-4.198-1.023-4.198-4.554a3.566 3.566 0 0 1 .948-2.474 3.313 3.313 0 0 1 .091-2.438s.773-.248 2.534.945a8.727 8.727 0 0 1 4.615 0c1.76-1.193 2.532-.945 2.532-.945a3.31 3.31 0 0 1 .092 2.438 3.562 3.562 0 0 1 .947 2.474c0 3.54-2.155 4.32-4.208 4.548a2.195 2.195 0 0 1 .625 1.706c0 1.232-.011 2.227-.011 2.529a.694.694 0 0 1-.272.587z"></path></svg>
            </a>
            <a href="https://linktr.ee/safenet.esiea" class="social-button linkedin">
                <svg viewBox="0 -2 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Icons" stroke="none" stroke-width="1">
                        <g transform="translate(-702.000000, -265.000000)">
                            <path d="M746,305 L736.2754,305 L736.2754,290.9384 C736.2754,287.257796 734.754233,284.74515 731.409219,284.74515 C728.850659,284.74515 727.427799,286.440738 726.765522,288.074854 C726.517168,288.661395 726.555974,289.478453 726.555974,290.295511 L726.555974,305 L716.921919,305 C716.921919,305 717.046096,280.091247 716.921919,277.827047 L726.555974,277.827047 L726.555974,282.091631 C727.125118,280.226996 730.203669,277.565794 735.116416,277.565794 C741.21143,277.565794 746,281.474355 746,289.890824 L746,305 L746,305 Z M707.17921,274.428187 L707.117121,274.428187 C704.0127,274.428187 702,272.350964 702,269.717936 C702,267.033681 704.072201,265 707.238711,265 C710.402634,265 712.348071,267.028559 712.41016,269.710252 C712.41016,272.34328 710.402634,274.428187 707.17921,274.428187 L707.17921,274.428187 L707.17921,274.428187 Z M703.109831,277.827047 L711.685795,277.827047 L711.685795,305 L703.109831,305 L703.109831,277.827047 L703.109831,277.827047 Z" id="LinkedIn">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="#" class="social-button facebook">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve">
                    <g id="XMLID_834_">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064
                            c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996
                            V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545
                            C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703
                            c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z">
                        </path>
                    </g>
                </svg>
            </a>
            <a href="https://www.instagram.com/safenet.esiea/" class="social-button instagram">
                <svg width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1">
                        <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -7439.000000)">
                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792" id="instagram-[#167]">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <div class="legal">
            <a href="mentions_legales.html">Mentions légales</a>
        </div>
        <div class="copyright">
            &copy; 2024 SafeNet. All rights reserved.
        </div>
    </div>
</footer>
</html>