document.getElementById('toggle-theme').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../include/update_theme.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            var newTheme = this.responseText; // La réponse attendue est le nouveau thème ('light' ou 'dark')
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
    xhr.send('toggle=true'); // Envoie une requête pour basculer le thème
});

// Add course cards
var courses = [
    { cover: '../img/module/module-1/Cover.jpeg', title: 'Comprendre les Attaques par Déni de Service (DoS et DDoS)', description: 'Dans ce cours, vous apprendrez les mécanismes des attaques DoS et DDoS, leurs impacts sur les systèmes informatiques, et les mesures de protection efficaces. Grâce à des exemples concrets et des explications détaillées, vous serez mieux préparé à reconnaître et contrer ces cybermenaces.', link: '../Modules/Module_1/Course.php'},
    { cover: '../img/module/module-2/Cover.jpeg', title: 'Démystifier les Attaques par Force Brute et par Dictionnaire', description: 'Ce cours explore les attaques par force brute et par dictionnaire, deux techniques couramment utilisées par les cybercriminels pour accéder illégalement aux systèmes et aux données. Vous apprendrez comment ces attaques fonctionnent, leurs différences et leurs similitudes, ainsi que les stratégies efficaces pour les prévenir. Grâce à des exemples pratiques et des explications claires, ce cours vise à vous fournir les connaissances nécessaires pour protéger vos systèmes contre ces menaces courantes.', link: '../Modules/Module_2/Course.php'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 3', description: 'Description 3', link: '#'}, 
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 4', description: 'Description 4', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 5', description: 'Description 5', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 6', description: 'Description 6', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 7', description: 'Description 7', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 8', description: 'Description 8', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 9', description: 'Description 9', link: '#'},
    { cover: '../img/pexels-photo-1072179.jpeg', title: 'Course 10', description: 'Description 10', link: '#'},
    // Add more courses as needed
];


var coursesElement = document.getElementById('courses');

courses.forEach(function(course) {
    var card = document.createElement('div');
    card.className = 'card';
    card.style.width = '18rem';

    var img = document.createElement('img');
    img.className = 'card-img-top';
    img.src = course.cover ; // Remplacez par le chemin de l'image du cours
    img.alt = ''; // Remplacez par une description de l'image

    var cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    var cardLink = document.createElement('a');
    cardLink.href = course.link; // Assurez-vous que chaque objet de cours a une propriété 'link'
    cardLink.className = 'btn btn-primary';
    cardLink.textContent = 'Commencer'; // Remplacez par le texte du lien

    var cardTitle = document.createElement('h5');
    cardTitle.className = 'card-title';
    cardTitle.textContent = course.title;

    var cardText = document.createElement('p');
    cardText.className = 'card-text';
    cardText.textContent = course.description;

    var cardLink = document.createElement('a');
    cardLink.href = course.link ; // Remplacez par le lien du cours
    cardLink.className = 'btn btn-primary';
    cardLink.textContent = 'Commencer'; // Remplacez par le texte du lien

    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardBody.appendChild(cardLink);

    card.appendChild(img);
    card.appendChild(cardBody);

    coursesElement.appendChild(card);
});

document.querySelector('.change-theme__icon').addEventListener('click', function() {
    this.classList.toggle('active');
});

document.querySelector('.search input[type="text"]').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        document.querySelector('.search button[type="submit"]').click();
    }
});

document.querySelector('.search button[type="submit"]').addEventListener('click', function(e) {
    e.preventDefault();
    var searchText = document.querySelector('.search input[type="text"]').value.toLowerCase();
    var courses = document.querySelectorAll('.card');
    for (var i = 0; i < courses.length; i++) {
        var course = courses[i];
        var title = course.querySelector('.card-title').textContent.toLowerCase();
        var description = course.querySelector('.card-text').textContent.toLowerCase();
        if (title.includes(searchText) || description.includes(searchText)) {
            course.scrollIntoView({ behavior: 'smooth' });
            break;
        }
    }
});