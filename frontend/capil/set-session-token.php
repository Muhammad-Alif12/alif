<?php

session_start();

$_SESSION['token_stakeholder'] = $_GET['jwt'];
$_SESSION['user_info'] = $_GET['user_info'];

?>