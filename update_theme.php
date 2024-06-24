<?php
session_start();
if (isset($_POST['toggle'])) {
    $_SESSION['theme'] = ($_SESSION['theme'] == 'light') ? 'dark' : 'light';
    echo $_SESSION['theme']; // Renvoie le nouveau thème pour mise à jour côté client
}
?>