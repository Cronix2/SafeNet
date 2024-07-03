<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/6295/6295417.png" width="100" />
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

SafeNet is a comprehensive network security and monitoring solution. It offers robust tools for managing and analyzing network traffic, ensuring your systems are protected against various cyber threats. Designed for both educational and practical applications, SafeNet provides modules and exercises to enhance understanding and implementation of network security principles.

---

## 📦 Features

* Real-time network monitoring
* Detection and prevention of DDoS attacks
* User-friendly web interface for managing security settings
* Educational modules for learning about network security
* Integration with Zabbix for advanced monitoring capabilities

---

## 📂 Repository Structure

<pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">└── SafeNet/
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
</code></div></div></pre>

---

## 🧩 Modules

<details closed><summary>Modules</summary>| File                                                                                   | Summary                                                  |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------- |
| [create_container.py](https://github.com/Cronix2/SafeNet/blob/master/create_container.py) | Script to create Docker containers for the SafeNet setup |

</details>
<details closed><summary>Include</summary>| File                                                                                     | Summary                                |
| ------------------------------------------------------------------------------------------ | ---------------------------------------- |
| [index.php](https://github.com/Cronix2/SafeNet/blob/master/Include/index.php)               | Main entry point for the web interface |
| [database.php](https://github.com/Cronix2/SafeNet/blob/master/Include/database.php)         | Database connection and operations     |
| [update_theme.php](https://github.com/Cronix2/SafeNet/blob/master/Include/update_theme.php) | Script to update the UI theme          |

</details>
<details closed><summary>signup</summary>| File                                                                        | Summary                           |
| ----------------------------------------------------------------------------- | ----------------------------------- |
| [signup.js](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.js)   | JavaScript for the signup process |
| [signup.css](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.css) | Stylesheet for the signup page    |
| [signup.php](https://github.com/Cronix2/SafeNet/blob/master/signup/signup.php) | PHP backend for user registration |

</details>
<details closed><summary>mainpage</summary>| File                                                                              | Summary                            |
| ----------------------------------------------------------------------------------- | ------------------------------------ |
| [mainpage.js](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.js)   | JavaScript for the main dashboard  |
| [mainpage.css](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.css) | Stylesheet for the main dashboard  |
| [mainpage.php](https://github.com/Cronix2/SafeNet/blob/master/mainpage/mainpage.php) | PHP backend for the main dashboard |

</details>
<details closed><summary>login</summary>| File                                                                     | Summary                             |
| -------------------------------------------------------------------------- | ------------------------------------- |
| [login.js](https://github.com/Cronix2/SafeNet/blob/master/login/login.js)   | JavaScript for the login process    |
| [login.css](https://github.com/Cronix2/SafeNet/blob/master/login/login.css) | Stylesheet for the login page       |
| [login.php](https://github.com/Cronix2/SafeNet/blob/master/login/login.php) | PHP backend for user authentication |

</details>
<details closed><summary>test</summary>| File                                                                                              | Summary                            |
| --------------------------------------------------------------------------------------------------- | ------------------------------------ |
| [test_loginpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_loginpage.php)         | Testing script for login page      |
| [test_mainpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_mainpage.php)           | Testing script for main page       |
| [test_signuppage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_signuppage.php)       | Testing script for signup page     |
| [test_twofactorpage.php](https://github.com/Cronix2/SafeNet/blob/master/test/test_twofactorpage.php) | Testing script for two-factor page |

</details>---

## 🚀 Getting Started

### ⚙️ Installation

Follow these steps to set up SafeNet on your local machine.

1. **Clone the repository:**

<pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">git clone https://github.com/Cronix2/SafeNet.git
   </code></div></div></pre>

1. **Navigate to the project directory:**

<pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">cd SafeNet
   </code></div></div></pre>

1. **Install dependencies:**

<pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">npm install
   </code></div></div></pre>

### 🤖 Running SafeNet

1. **Start the application:**
   <pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">npm start
   </code></div></div></pre>
2. **Open your browser and navigate to:**
   <pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>arduino</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-arduino">http://localhost:3000
   </code></div></div></pre>

### 🧪 Tests

To run the test suite, execute:

<pre><div class="dark bg-gray-950 rounded-md border-[0.5px] border-token-border-medium"><div class="flex items-center relative text-token-text-secondary bg-token-main-surface-secondary px-4 py-2 text-xs font-sans justify-between rounded-t-md"><span>sh</span><div class="flex items-center"><span class="" data-state="closed"><button class="flex gap-1 items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon-sm"><path fill="currentColor" fill-rule="evenodd" d="M7 5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-2v2a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h2zm2 2h5a3 3 0 0 1 3 3v5h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-9a1 1 0 0 0-1 1zM5 9a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-9a1 1 0 0 0-1-1z" clip-rule="evenodd"></path></svg>Copier le code</button></span></div></div><div class="overflow-y-auto p-4" dir="ltr"><code class="!whitespace-pre hljs language-sh">npm test
</code></div></div></pre>

---

## 🛠 Project Roadmap

SafeNet aims to continually evolve and include more features over time. Planned updates include:

* [ ] Enhanced DDoS detection algorithms
* [ ] Integration with additional monitoring tools
* [ ] More educational modules and exercises
* [ ] Support for more languages

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
