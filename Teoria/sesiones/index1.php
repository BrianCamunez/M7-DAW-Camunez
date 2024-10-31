<?php

session_start();

$_SESSION['username'] = 'Juan';
$_SESSION['age'] = 22;

echo $_SESSION['username'];
echo $_SESSION['age'];




?>
