<?php

    define('HOST', 'localhost');
    define('DB_name', 'safenet');
    define('USER', 'root');
    define('PASSWORD', '');

    try {
        $db = new PDO("mysql:host=".HOST.";dbname=".DB_name, USER, PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
    }
