document.getElementById('toggle-theme').addEventListener('click', function() {
document.body.classList.toggle('dark');
});

    // Add course cards
    var courses = [
        { title: 'Course 1', description: 'Description 1', link: '#'},
        { title: 'Course 2', description: 'Description 2', link: '#'},
        { title: 'Course 3', description: 'Description 3', link: '#'},
        { title: 'Course 4', description: 'Description 4', link: '#'},
        { title: 'Course 5', description: 'Description 5', link: '#'},
        { title: 'Course 6', description: 'Description 6', link: '#'},
        { title: 'Course 7', description: 'Description 7', link: '#'},
        { title: 'Course 8', description: 'Description 8', link: '#'},
        { title: 'Course 9', description: 'Description 9', link: '#'},
        { title: 'Course 10', description: 'Description 10', link: '#'},
        { title: 'Course 11', description: 'Description 11', link: '#'},
        { title: 'Course 12', description: 'Description 12', link: '#'},
        { title: 'Course 13', description: 'Description 13', link: '#'},
        { title: 'Course 14', description: 'Description 14', link: '#'},
        { title: 'Course 15', description: 'Description 15', link: '#'},
        { title: 'Course 16', description: 'Description 16', link: '#'},
        { title: 'Course 17', description: 'Description 17', link: '#'},
        { title: 'Course 18', description: 'Description 18', link: '#'},
        { title: 'Course 19', description: 'Description 19', link: '#'},
        { title: 'Course 20', description: 'Description 20', link: '#'},
        // Add more courses as needed
    ];

    var coursesElement = document.getElementById('courses');

    courses.forEach(function(course) {
    var card = document.createElement('div');
    card.className = 'card';
    card.style.width = '18rem';

    var img = document.createElement('img');
    img.className = 'card-img-top';
    img.src = '../img/pexels-photo-1072179.jpeg'; // Remplacez par le chemin de l'image du cours
    img.alt = ''; // Remplacez par une description de l'image

    var cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    var cardLink = document.createElement('a');
    cardLink.href = course.link; // Assurez-vous que chaque objet de cours a une propriété 'link'
    cardLink.className = 'btn btn-primary';
    cardLink.textContent = 'Go somewhere'; // Remplacez par le texte du lien

    var cardTitle = document.createElement('h5');
    cardTitle.className = 'card-title';
    cardTitle.textContent = course.title;

    var cardText = document.createElement('p');
    cardText.className = 'card-text';
    cardText.textContent = course.description;

    var cardLink = document.createElement('a');
    cardLink.href = '#'; // Remplacez par le lien du cours
    cardLink.className = 'btn btn-primary';
    cardLink.textContent = 'Go somewhere'; // Remplacez par le texte du lien

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