<?php

session_start();

unset($_SESSION['sesionIniciada']);

header("Location:login.php");
exit();

?>