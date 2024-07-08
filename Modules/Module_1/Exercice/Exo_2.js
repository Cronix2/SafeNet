document.getElementById('moveGreenDot').addEventListener('click', function() {
    // Supposons que vous avez déjà une référence à l'image de zombie sélectionnée, par exemple :
    var selectedZombieImage = document.querySelectorAll('.zombie-image:not([style*="display: none"])');

    const desktopContainer = document.getElementById('zombie-container');

    selectedZombieImage.forEach(zombieImage => {
        // Calculer le centre de l'image de zombie
        var centerXZombie = zombieImage.offsetLeft + zombieImage.offsetWidth / 2 - 5;
        var centerYZombie = zombieImage.offsetTop + zombieImage.offsetHeight / 2 - 5;

        // Calculer le centre de l'image du serveur
        var serverImage = document.getElementById('serverImage');
        var centerXServer =  serverImage.offsetLeft + serverImage.offsetWidth / 2;
        var centerYServer =  serverImage.offsetTop + serverImage.offsetHeight / 1.25;

        // Créer un élément pour représenter le point de départ (si nécessaire)
        var greenDot = document.createElement('div');
        greenDot.style.position = 'absolute';
        greenDot.style.width = '10px'; // Taille du point
        greenDot.style.height = '10px';
        greenDot.style.backgroundColor = 'green';
        greenDot.style.borderRadius = '50%';
        desktopContainer.appendChild(greenDot); // Ajouter le point au document

        // Positionner le point au centre de l'image de zombie
        greenDot.style.left = `${centerXZombie - 5}px`; // 5 est la moitié de la largeur du point pour le centrer
        greenDot.style.top = `${centerYZombie - 5}px`; // 5 est la moitié de la hauteur du point pour le centrer

        //Déplacer le point du centre de l'image de zombie au centre de l'image du serveur
        greenDot.animate([
            { transform: `translate(0px, 0px)` },
            { transform: `translate(${(centerXServer + centerXZombie)/2.5}px, ${(centerYServer - centerYZombie)}px)` }
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
});

var intervalId = setInterval(() => {
    const lignes = document.querySelectorAll('.text_table');
    for (let i = 2; i < lignes.length; i++) {
        lignes[i - 1].textContent = lignes[i].textContent; 
    }
    lignes[lignes.length - 1].textContent = ''; 
}, 200);         

document.getElementById('changer_d\'exo').addEventListener('click', function() {
    window.location.href = '../../../mainpage/mainpage.php';
});

document.getElementById('changer_d\'exo_popup').addEventListener('click', function() {
    window.location.href = '../../../mainpage/mainpage.php';
});

document.getElementById('createZombie').addEventListener('click', function() {
    // Trouver toutes les images de zombies
    var zombies = document.querySelectorAll('.zombie-image');
    // Trouver la première image de zombie cachée et l'afficher
    for (var i = 0; i < zombies.length; i++) {
        if (zombies[i].style.display === 'none') {
            zombies[i].style.display = 'block';
            break; // Arrêter après avoir affiché le premier zombie caché
        }
    }
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