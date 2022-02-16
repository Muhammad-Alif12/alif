<?php

session_start();

$_SESSION['token_stakeholder'] = $_GET['jwt'];

?>