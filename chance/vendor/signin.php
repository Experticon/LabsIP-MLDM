<?php
    session_start();
    require_once 'connect.php';
    global $connect;

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `aboba` WHERE `login` = '$login' AND `password` = '$password'");
    echo (int) $check_user->num_rows;
    /*if ((int) $check_user->num_rows > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
        ];
        header('Location: ../profile.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../auto.php');
    }*/
?>
