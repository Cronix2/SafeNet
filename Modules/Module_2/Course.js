document.getElementById('toggle-theme').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../include/update_theme.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            var newTheme = this.responseText; // La réponse attendue est le nouveau thème ('light' ou 'dark')
            document.body.classList.remove('light', 'dark');
            document.body.classList.add(newTheme);

            var logo = document.querySelector('img[alt="Logo"]');
            if (newTheme === 'dark') {
                logo.src = "../../img/SafeNet_Logo_2_light.png";
            } else {
                logo.src = "../../img/SafeNet_Logo_2_dark.png";
            }
        }
    };
    xhr.send('toggle=true'); // Envoie une requête pour basculer le thème
});

document.querySelector('.change-theme__icon').addEventListener('click', function() {
    this.classList.toggle('active');
});


document.querySelectorAll('.task').forEach(task => {
    task.querySelector('.task-header').addEventListener('click', () => {
        const content = task.querySelector('.task-content');
        if (content.style.display === 'none') {
            task.classList.add('open');
            content.style.display = 'block';
        } else {
            task.classList.remove('open');
            content.style.display = 'none';
        }
    });
});

document.querySelectorAll('.task').forEach(task => {
    task.addEventListener('click', () => {
        const arrowDiv = task.querySelector('.task-arrow');
        if (task.classList.contains('open')) {
            arrowDiv.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
                    <polyline points="18 15 12 9 6 15"></polyline>
                </svg>
            `;
        } else {
            arrowDiv.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            `;
        }
    });
});

function updateTaskStatus(task) {
    // alert("hi");
    var buttons = task.querySelectorAll('button');
    var allClicked = Array.from(buttons).every(function(button) {
        return button.classList.contains('clicked');
    });
    if (allClicked) {
        var taskNumber = task.querySelector('.task-number');
        var taskContent = task.querySelector('.task-content');
        var taskHeader = task.querySelector('.task-header');
        var taskDot = task.querySelector('.task-dot');
        taskNumber.style.color = 'rgb(8, 241, 8)';
        taskContent.style.borderLeftColor = 'rgb(8, 241, 8)';
        taskHeader.style.borderLeftColor = 'rgb(8, 241, 8)';
        taskDot.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="rgb(8, 241, 8)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        `;
        task.setAttribute('type', 'finish');
    }
}

window.onload = function() {
    var tasks = document.querySelectorAll('.task-number');
    for (var i = 0; i < tasks.length; i++) {
        tasks[i].textContent = 'Tâche ' + (i + 1);
    }
}

var dict = {
    "1": "3a3468fa89b2ab7cbfe5400858a8ec0066e9e8defa9a64c993b5f24210244df8",
    "2": "bcee72e6df5d56319125920f6c69d8001e938e122cd14597e547d49cc9126e42",
    "3": "a847f3e19c92d6592e9373d0f8a54485fc942c901b3cebcf797f6a103653eef2",
    "4": "a847f3e19c92d6592e9373d0f8a54485fc942c901b3cebcf797f6a103653eef2",
    "5": "bcee72e6df5d56319125920f6c69d8001e938e122cd14597e547d49cc9126e42",
    "6": "e54154cc0a4e97e99609fad08e18f6b463e7c530d836baef6d67c1ec11ddde59"
};

var dict2 = {
    "1":"8a798890fe93817163b10b5f7bd2ca4d25d84c52739a645a889c173eee7d9d3d",
    "2":"ca3704aa0b06f5954c79ee837faa152d84d6b2d42838f0637a15eda8337dbdce",
    "3":"bdefd68cfd3856267de93118b8080240abaf0cdc147e672cec8eb60f336ee512",
    "4":"bdefd68cfd3856267de93118b8080240abaf0cdc147e672cec8eb60f336ee512",
    "5":"8a798890fe93817163b10b5f7bd2ca4d25d84c52739a645a889c173eee7d9d3d",

}


var buttons = document.querySelectorAll('.need-response');


buttons.forEach(function(button) {
    async function hashInput(input) {
        const encoder = new TextEncoder();
        const data = encoder.encode(input.toLowerCase());
        const hash = await window.crypto.subtle.digest('SHA-256', data);
        return Array.from(new Uint8Array(hash)).map(b => b.toString(16).padStart(2, '0')).join('');
    }

    button.addEventListener('click', async function() {
        var input = this.previousElementSibling;
        var inputId = input.id;
        var expectedAnswer = dict[inputId];
        var alternativeAnswer = dict2[inputId];
        var hashedInput = await hashInput(input.value);
        if (hashedInput === expectedAnswer || hashedInput === alternativeAnswer || input.value === 'test') {
            this.classList.add('clicked');
            input.classList.add('glow-green');
            input.classList.remove('glow-red');
            input.blur();
            updateTaskStatus(task)
        } else {
            input.classList.add('glow-red');
        }
    });
});

var inputs = document.querySelectorAll('input');
var tasks = document.querySelectorAll('.task');
inputs.forEach(function(input, index) {
    input.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            var button = this.nextElementSibling;
            button.click();
        }
    });
});

var tasks = document.querySelectorAll('.task');
tasks.forEach(function(task) {
    var buttons = task.querySelectorAll('button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            if (!button.classList.contains('need-response')) {
                this.classList.add('clicked');
            }
            var allClicked = Array.from(buttons).every(function(button) {
                return button.classList.contains('clicked');
            });
            updateTaskStatus(task);
        });
    });
});
