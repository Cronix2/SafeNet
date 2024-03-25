document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark');
});

// Add course cards
var courses = [
    { title: 'Course 1', description: 'Description 1' },
    // Add more courses as needed
];

var coursesElement = document.getElementById('courses');

courses.forEach(function(course) {
    var card = document.createElement('div');
    card.textContent = course.title + ': ' + course.description;
    coursesElement.appendChild(card);
});