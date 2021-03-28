<?php
include_once('functions.php');
addUser($_POST['first_name'], $_POST['last_name'], $_POST['email']);
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
