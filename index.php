<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: test/test_loginpage.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="0; url=test/test_testloginpage.php">
</head>
</html>