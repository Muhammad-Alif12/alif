<?php

    include('connect.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = $db->prepare('SELECT * FROM user WHERE email=:email AND password=:password');
    $data['email'] = $email;
    $data['password'] = $password;
    $pdo->execute($data);
    $user = $pdo->fetch();

    
    echo $pdo->rowCount();
    if($pdo->rowCount()){
        header('location: layananUmum.php?=user_id='.$user['id']);
    }
    else {
        header('location: index.php');
    }