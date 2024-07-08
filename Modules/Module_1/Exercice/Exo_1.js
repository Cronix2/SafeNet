
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
            serverImage.src = '../../../img/module/module-1/exo_1_server_fire.png';
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
    window.location.href = 'Exo_2.php';
});

document.getElementById('changer_d\'exo_popup').addEventListener('click', function() {
    window.location.href = 'Exo_2.php';
});

document.getElementById('toggle-theme').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../../Include/update_theme.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            var newTheme = this.responseText;
            document.body.classList.remove('light', 'dark');
            document.body.classList.add(newTheme);

            var logo = document.querySelector('img[alt="Logo"]');
            if (newTheme === 'dark') {
                logo.src = "../../../img/SafeNet_Logo_2_light.png";
            } else {
                logo.src = "../../../img/SafeNet_Logo_2_dark.png";
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