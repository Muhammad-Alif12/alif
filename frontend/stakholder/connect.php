<?php

    $servername = 'localhost';
    $database   = 'dataLayanan-bantaeng';
    $username   = 'root';
    $password   = '';
    
    $db         = new PDO("mysql:host=$servername;dbname=$database", $username, $password);