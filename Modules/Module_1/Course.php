<?php
session_start();
include '../../Include/database.php';
if (!isset($_SESSION['pseudo'])){
    header('Location: ../../../../../index.php');
    exit();
}
if ($_SESSION['theme'] == 'light'){
    $button_theme = 'disactive';
    $logo = '../../img/SafeNet_Logo_2_dark.png';
} else {
    $button_theme =  'active';
    $logo = '../../img/SafeNet_Logo_2_light.png';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SafeNet</title>
    <link rel="icon" href="../../img/SafeNet_Logo_1.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="Course.css">
</head>
<header id="sticky-header">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">            
            <div class="nav">
                <a class="navbar-brand" href="../../Include/index.php">
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
                <img src="../../img/pexels-photo-1072179.jpeg" alt="Avatar" class="avatar">
            </div>
        </div>
    </nav>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <img src="../../img/award.png" alt="Award" style="width: 100px; height: 100px;">
            <h2>Félicitations</h2>
            <h3>Vous avez terminé le cours</h3>
            <p>Vous avez terminé le cours avec succès.</p>
            <p>Vous pouvez maintenant passer à l'exercice pour tester vos connaissances.</p>
            <button id="goToExercise2" class="go-exercice" onclick="go_exercice()">
                Aller à l'exercice
            </button>
        </div>
    </div>

</header>
<body class = "<?= $_SESSION['theme']?>">
    
    <div class="task">
        <div class="task-header">
            <span class="task-number"></span>
            <div class="task-dot">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle task-dot">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            <span class="task-name">Introduction</span>
            <div class="task-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>                         
        </div>
        <div class="task-content" style="display: none">
            <p>Les attaques DoS (Déni de Service) et DDoS (Déni de Service Distribué) sont des moyens utilisés par des cybercriminels pour rendre un site web ou un service en ligne indisponible, causant ainsi des désagréments aux utilisateurs.</p>
    
            <p>Ces attaques exploitent des vulnérabilités dans les infrastructures en ligne pour submerger les serveurs de trafic, empêchant ainsi les utilisateurs légitimes d'accéder aux services qu'ils recherchent.</p>
    
            <p>Les attaques DoS sont généralement lancées à partir d'une seule machine, tandis que les attaques DDoS impliquent plusieurs machines réparties dans le monde entier, souvent contrôlées à distance par des botnets. Les conséquences de ces attaques peuvent être graves, allant de l'interruption temporaire des services à des pertes financières significatives et à des dommages à la réputation.</p>
    
            <p>Il est essentiel de comprendre ces menaces pour mettre en place des stratégies de défense efficaces et protéger les infrastructures numériques contre ces formes d'attaque.</p>
    
            <button class="read-and-understood">J'ai lu et compris</button>
        </div>
    </div>

    <div class="task">
        <div class="task-header">
            <span class="task-number"></span>
            <div class="task-dot">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle task-dot">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            <span class="task-name">Fonctionnement simplifié</span>
            <div class="task-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>                        
        </div>
        <div class="task-content" style="display: none">
            <p>Les attaques DoS (Denial of Service) et DDoS (Distributed Denial of Service) fonctionnent de manière simple : elles inondent un site web ou un service avec un volume énorme de demandes, comme une foule immense bloquant l’entrée d’une boulangerie, empêchant quiconque d'y entrer.</p>
            
            <p>Une attaque DoS utilise un seul ordinateur pour envoyer ces demandes, tandis qu'une attaque DDoS en utilise plusieurs à travers le monde, souvent sans que les propriétaires de ces ordinateurs en soient conscients. Ces ordinateurs sont souvent infectés par des logiciels malveillants qui les transforment en "zombies", participant à l'attaque à l'insu de leur propriétaire.</p>

            <ul>
                <li><strong>exemple d'attaque DoS :</strong>
            </ul>
            <img src="../../img/module/module-1/DoS_better.gif" alt="Description du GIF" style="margin-left: 20px;">
            <ul>
                <li><strong>exemple d'attaque DDoS :</strong>
            </ul>
            <img src="../../img/module/module-1/DDoS_better.gif" alt="Description du GIF" style="margin-left: 20px;">
            
            <p>Les attaques peuvent avoir des conséquences graves, notamment :</p>
            <ul>
                <li><strong>Interruption de service :</strong> Les utilisateurs légitimes ne peuvent plus accéder au service ou au site web ciblé.</li>
                <li><strong>Perte financière :</strong> Les entreprises peuvent perdre des revenus en raison de l'indisponibilité de leurs services.</li>
                <li><strong>Atteinte à la réputation :</strong> La confiance des clients et des utilisateurs peut être affectée négativement.</li>
            </ul>
    
            <p>Comprendre le fonctionnement de ces attaques est crucial pour pouvoir mettre en place des mesures de protection efficaces et réduire leur impact.</p>
            <p> Quel type d'attaque utilise plusieurs ordinateurs à travers le monde ?</p>
            <div class="question">
                <input id="1" type="text" class="responseFormat" placeholder="Format de réponse: ****** " autocomplete="off">
                <button id="1" class="need-response">Envoyer</button>
            </div>
            <p> Quel type d'attaque utilise un seul ordinateur ?</p>
            <div class="question">
                <input id="2" type="text" class="responseFormat" placeholder="Format de réponse: ****** " autocomplete="off">
                <button id="2" class="need-response">Envoyer</button>
            </div>
            <button class="read-and-understood">J'ai lu et compris</button>
        </div>
    </div>

    <div class="task">
        <div class="task-header">
            <span class="task-number"></span>
            <div class="task-dot">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle task-dot">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            <span class="task-name">Sensibilisation et Protection</span>
            <div class="task-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div> 
        </div>
        <div class="task-content" style="display: none">
            <p>Pour se protéger contre ces attaques, il existe quelques solutions simples et pratiques :</p>
            
            <ul>
                <li><strong>Utiliser un pare-feu :</strong> Cela aide à filtrer les trafics indésirables et à bloquer les attaques avant qu'elles n'atteignent le site ou le service.</li>
                <li><strong>Mettre à jour régulièrement ses systèmes :</strong> Les mises à jour logicielles contiennent souvent des améliorations de sécurité qui aident à protéger contre les nouvelles formes d'attaques.</li>
                <li><strong>Souscrire à des services de protection DDoS :</strong> Des entreprises spécialisées offrent des services pour détecter et atténuer les attaques DDoS, en assurant la continuité du service même sous attaque.</li>
                <li><strong>Sensibiliser et former :</strong> Former les employés et les utilisateurs sur les risques et les signes d'une attaque peut aider à détecter et réagir plus rapidement en cas d’incident.</li>
                <li><strong>Utiliser des CAPTCHA :</strong> Ces tests permettent de distinguer les humains des robots, en demandant aux utilisateurs de réaliser de petites tâches, comme identifier des images ou taper des caractères. Cela peut aider à limiter les demandes automatiques massives des attaques.</li>
            </ul>
    
            <p>En adoptant ces mesures, les entreprises peuvent renforcer leur sécurité et réduire les risques liés aux attaques DoS et DDoS. Une vigilance constante et une sensibilisation accrue sont essentielles pour protéger les infrastructures numériques.</p>
            <p> Quel outil peut filtrer les trafics indésirables ?</p>
            <div class="question">
                <input id="3" type="text" class="responseFormat" placeholder="Format de réponse: ****** " autocomplete="off">
                <button id="3" class="need-response">Envoyer</button>
            </div>
            <p> Quel type de test peut distinguer les humains des robots ?</p>
            <div class="question">
                <input id="4" type="text" class="responseFormat" placeholder="Format de réponse: ****** " autocomplete="off">
                <button id="4" class="need-response">Envoyer</button>
            </div>
            <button class="read-and-understood">J'ai lu et compris</button>
        </div>
    </div>

    <div class="task">
        <div class="task-header">
            <span class="task-number"></span>
            <div class="task-dot">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle task-dot">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
            </div>
            <span class="task-name">Conclusion</span>
            <div class="task-arrow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>                        
        </div>
        <div class="task-content" style="display: none">
            <p>En résumé, les attaques DoS (Denial of Service) et DDoS (Distributed Denial of Service) sont comparables à une foule qui bloque l’accès à une boulangerie, mais dans le monde numérique. Elles submergent les sites web et les services en ligne avec des demandes massives, les rendant inaccessibles.</p>
            
            <p>Ces attaques peuvent causer des interruptions significatives, nuire à la réputation des entreprises, et entraîner des pertes financières importantes. Pour se protéger efficacement contre ces menaces, il est crucial d'adopter plusieurs mesures préventives.</p>
            
            <ul>
                <li><strong>Utilisation de pare-feux :</strong> Les pare-feux peuvent filtrer le trafic malveillant et bloquer les attaques avant qu'elles n'atteignent les systèmes cibles.</li>
                <li><strong>Mise à jour régulière des systèmes :</strong> Maintenir les logiciels et les systèmes à jour avec les derniers correctifs de sécurité permet de combler les vulnérabilités exploitées par les attaquants.</li>
                <li><strong>Utilisation de services spécialisés :</strong> Des services de protection contre les DDoS, offerts par des fournisseurs spécialisés, peuvent détecter et atténuer les attaques en temps réel.</li>
            </ul>
    
            <p>La <strong>sensibilisation et la formation</strong> jouent également un rôle clé pour maintenir un environnement numérique sécurisé et accessible. En formant les employés aux bonnes pratiques de sécurité et en les sensibilisant aux menaces potentielles, les entreprises peuvent réduire considérablement les risques d'attaques réussies.</p>
            
            <p>En conclusion, bien que les attaques DoS et DDoS représentent une menace sérieuse pour les infrastructures numériques, des mesures proactives et une vigilance constante permettent de renforcer la sécurité et de garantir la disponibilité des services en ligne.</p>
            <button class="read-and-understood">J'ai lu et compris</button>
        </div>
    </div>

    <button id="goToExercise1" class="go-exercice" onclick="go_exercice()">
        Aller à l'exercice
    </button>
    <script>
        var buttons = document.querySelectorAll('button');
        buttons.forEach(function(button) {
            button.addEventListener('click', async function() {
                const allTasksFinished = Array.from(document.querySelectorAll('.task')).every(task => task.getAttribute('data-type') === 'finish');
                if (allTasksFinished) {
                    document.getElementById('goToExercise1').style.display = 'block';
                    document.getElementById('goToExercise2').style.display = 'block';
                    document.querySelector('.popup').style.display = 'block';
                    openPopup();
                    <?php $_SESSION['cours1'] = 'check'?>
                }
            });
        });
        var popup = document.getElementById("popup");
        var closeBtn = document.getElementsByClassName("close-btn")[0];
        closeBtn.onclick = function() {
            popup.style.display = "none";
        }

        function openPopup() {
            popup.style.display = "block";
        }

        function go_exercice() {
            window.location.href = "Exercice/Exo_1.php";
        }
    </script>
    <script type="module" src="Course.js"></script>

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