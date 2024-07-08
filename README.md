<p align="center">
  <img src="img/SafeNet_Logo_1.svg" width="100" />
</p>
<p align="center">
    <h1 align="center">SAFENET</h1>
</p>
<p align="center">
    <em><code>Your reliable solution for network security and monitoring.</code></em>
</p>
<p align="center">
	<img src="https://img.shields.io/github/license/Cronix2/SafeNet?style=flat&color=0080ff" alt="license">
	<img src="https://img.shields.io/github/last-commit/Cronix2/SafeNet?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
	<img src="https://img.shields.io/github/languages/top/Cronix2/SafeNet?style=flat&color=0080ff" alt="repo-top-language">
	<img src="https://img.shields.io/github/languages/count/Cronix2/SafeNet?style=flat&color=0080ff" alt="repo-language-count">
<p>
<p align="center">
		<em>Developed with the software and tools below.</em>
</p>
<p align="center">
	<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
	<img src="https://img.shields.io/badge/HTML5-E34F26.svg?style=flat&logo=HTML5&logoColor=white" alt="HTML5">
	<img src="https://img.shields.io/badge/YAML-CB171E.svg?style=flat&logo=YAML&logoColor=white" alt="YAML">
	<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">
	<img src="https://img.shields.io/badge/Python-3776AB.svg?style=flat&logo=Python&logoColor=white" alt="Python">
</p>
<hr>## 🔗 Quick Links

> * [📍 Overview](#-overview)
> * [📦 Features](#-features)
> * [📂 Repository Structure](#-repository-structure)
> * [🧩 Modules](#-modules)
> * [🚀 Getting Started](#-getting-started)
>   * [⚙️ Installation](#%EF%B8%8F-installation)
>   * [🤖 Running SafeNet](#-running-SafeNet)
>   * [🧪 Tests](#-tests)
> * [🛠 Project Roadmap](#-project-roadmap)
> * [🤝 Contributing](#-contributing)
> * [📄 License](#-license)
> * [👏 Acknowledgments](#-acknowledgments)

---

## 📍 Overview

SafeNet is a website dedicated to teaching the basics of computer science and cybersecurity to novices. It offers simple lessons and practical activities to educate users about Internet risks, including common attacks. The goal is to provide accessible training to enhance personal safety online.

## 📦 Features

* Educational modules for learning about network security
* User-friendly web interface for managing security settings
* Real-time network monitoring
* Integration with Zabbix for advanced monitoring capabilities

---

## 📂 Repository Structure

```sh
└── SafeNet/
    ├── Include
    │   ├── database.php
    │   ├── index.php
    │   └── update_theme.php
    ├── LICENSE.md
    ├── Modules
    │   ├── Module_1
    │   │   ├── Course.css
    │   │   ├── Course.js
    │   │   ├── Course.php
    │   │   └── Exercice
    │   │       ├── Exo_1.css
    │   │       ├── Exo_1.js
    │   │       ├── Exo_1.php
    │   │       ├── Exo_2.css
    │   │       ├── Exo_2.js
    │   │       └── Exo_2.php
    │   └── Module_2
    │       ├── Course.css
    │       ├── Course.js
    │       └── Course.php
    ├── README.md
    ├── create_container.py
    ├── img
    │   ├── SafeNet-Logo.png
    │   ├── SafeNet_Logo.png
    │   ├── SafeNet_Logo.svg
    │   ├── SafeNet_Logo_1.png
    │   ├── SafeNet_Logo_1.svg
    │   ├── SafeNet_Logo_2.png
    │   ├── SafeNet_Logo_2_dark.png
    │   ├── SafeNet_Logo_2_light.png
    │   ├── award.gif
    │   ├── award.png
    │   ├── logo with text.png
    │   ├── mail.gif
    │   ├── module
    │   │   ├── module-1
    │   │   │   ├── Cover.jpeg
    │   │   │   ├── DDoS.gif
    │   │   │   ├── DoS.gif
    │   │   │   ├── exo_1_desktop.png
    │   │   │   ├── exo_1_server.png
    │   │   │   ├── exo_1_server_fire.png
    │   │   │   └── exo_1_zombie_desktop.png
    │   │   └── module-2
    │   │       └── Cover.jpeg
    │   └── pexels-photo-1072179.jpeg
    ├── login
    │   ├── login.css
    │   ├── login.js
    │   └── login.php
    ├── mainpage
    │   ├── mainpage.css
    │   ├── mainpage.js
    │   └── mainpage.php
    ├── signup
    │   ├── signup.css
    │   ├── signup.js
    │   └── signup.php
    ├── test
    │   ├── Demo_1.php
    │   ├── Demo_2.php
    │   ├── exo_1.php
    │   ├── exo_2.php
    │   ├── mail.html
    │   ├── test_loginpage.php
    │   ├── test_mainpage.php
    │   ├── test_signuppage.php
    │   └── test_twofactorpage.php
    └── zabbix
        ├── docker-compose.yml
        ├── docker-compose.yml.swp
        └── env
```

---

## 🧩 Modules

| File                                                                                   | Summary                                                  |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------- |
| [create_container.py](https://github.com/Cronix2/SafeNet/blob/master/create_container.py) | Script to create Docker containers for the SafeNet setup |

| File                                                                                     | Summary                                |
| ---------------------------------------------------------------------------------------- | -------------------------------------- |
| [index.php](https://github.com/Cronix2/SafeNet/blob/master/Include/index.php)               | Main entry point for the web interface |
| [database.php](https://github.com/Cronix2/SafeNet/blob/master/Include/database.php)         | Database connection and operations     |
| [update_theme.php](https://github.com/Cronix2/SafeNet/blob/master/Include/update_theme.php) | Script to update the UI theme          |

| File                                                                        | Summary                           |
| --------------------------------------------------------------------------- | --------------------------------- |
| [signup.js](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.js)   | JavaScript for the signup process |
| [signup.css](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.css) | Stylesheet for the signup page    |
| [signup.php](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.php) | PHP backend for user registration |

| File                                                                              | Summary                            |
| --------------------------------------------------------------------------------- | ---------------------------------- |
| [mainpage.js](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.js)   | JavaScript for the main dashboard  |
| [mainpage.css](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.css) | Stylesheet for the main dashboard  |
| [mainpage.php](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.php) | PHP backend for the main dashboard |

| File                                                                     | Summary                             |
| ------------------------------------------------------------------------ | ----------------------------------- |
| [login.js](https://github.com/Cronix2/SafeNet/blob/master/login/login.js)   | JavaScript for the login process    |
| [login.css](https://github.com/Cronix2/SafeNet/blob/master/login/login.css) | Stylesheet for the login page       |
| [login.php](https://github.com/Cronix2/SafeNet/blob/master/login/login.php) | PHP backend for user authentication |

| File                                                                                              | Summary                            |
| ------------------------------------------------------------------------------------------------- | ---------------------------------- |
| [test_loginpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_loginpage.php)         | Testing script for login page      |
| [test_mainpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_mainpage.php)           | Testing script for main page       |
| [test_signuppage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_signuppage.php)       | Testing script for signup page     |
| [test_twofactorpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_twofactorpage.php) | Testing script for two-factor page |

---

## 🚀 Getting Started

### ⚙️ Installation

Follow these steps to set up SafeNet on your local machine.

1. **Clone the repository:**

```sh
git clone https://github.com/Cronix2/SafeNet.git
```

1. **Navigate to the project directory:**

```sh
cd SafeNet
```

1. **Install dependencies:**

```sh
npm install
```

### 🤖 Running SafeNet

1. **Start the application:**

   ```sh
   npm start
   ```
2. **Open your browser and navigate to:**

   ```sh
   http://localhost:3000
   ```

### 🧪 Tests

To run the test suite, execute:

```sh
npm test
```

---

## 🛠 Project Roadmap

SafeNet aims to continually evolve and include more features over time. Planned updates include:

* [X] First push of the project
* [X] Add licence
* [X] Added examples of DoS and DDoS attacks with GIFs
* [X] Improved input validation and comments for quiz questions
* [X] Cookies gestion
* [X] Reorganized form submission on registration page for better code readability and user experience
* [X] Integration with additional monitoring tools
* [X] More educational modules and exercises
* [ ] Support for more languages
* [ ] Two factor authentification

---

## 🤝 Contributing

We welcome contributions from the community! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature-branch`.
3. Make your changes and commit them: `git commit -m 'Add new feature'`.
4. Push to the branch: `git push origin feature-branch`.
5. Open a pull request on GitHub.

---

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/Cronix2/SafeNet/blob/master/LICENSE.md) file for details.

---

## 👏 Acknowledgments

We thank all the contributors who have helped in developing SafeNet. Special thanks to the creators of the tools and libraries used in this project.
